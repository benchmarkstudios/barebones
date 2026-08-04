import { copyFileSync, mkdirSync, readdirSync, rmSync } from 'node:fs';
import { basename, dirname, extname, resolve } from 'node:path';
import { defineConfig } from 'vite';

const themeRoot = import.meta.dirname;
const blocksDirectory = resolve(themeRoot, 'blocks');
const buildDirectory = resolve(themeRoot, '.vite-build');

function findFiles(directory, extension) {
    return readdirSync(directory, { withFileTypes: true }).flatMap((entry) => {
        const path = resolve(directory, entry.name);

        if (entry.isDirectory()) {
            return findFiles(path, extension);
        }

        return entry.isFile() && extname(entry.name) === extension ? [path] : [];
    });
}

function addBlockEntries(entries, extension, outputDirectory) {
    for (const path of findFiles(blocksDirectory, extension)) {
        if (path.endsWith('.min.js')) {
            continue;
        }

        const name = basename(path, extension);
        const outputName = `${outputDirectory}/${name}`;

        if (entries[outputName]) {
            throw new Error(`Multiple block assets would compile to ${outputName}`);
        }

        entries[outputName] = path;
    }
}

function publishThemeAssets() {
    return {
        name: 'publish-theme-assets',
        writeBundle(options, bundle) {
            for (const output of Object.values(bundle)) {
                const source = resolve(options.dir, output.fileName);
                const destination = resolve(themeRoot, output.fileName);

                mkdirSync(dirname(destination), { recursive: true });
                copyFileSync(source, destination);
            }
        },
        closeBundle() {
            rmSync(buildDirectory, { force: true, recursive: true });
        },
    };
}

export default defineConfig(({ mode }) => {
    const entries = {
        style: resolve(themeRoot, 'assets/styles/style.scss'),
        'css/editor-styles': resolve(themeRoot, 'assets/styles/admin/_editor.scss'),
        'js/scripts.min': resolve(themeRoot, 'assets/scripts/scripts.js'),
    };

    addBlockEntries(entries, '.js', 'js/blocks');
    addBlockEntries(entries, '.scss', 'css/blocks');

    return {
        plugins: [publishThemeAssets()],
        build: {
            cssCodeSplit: true,
            cssTarget: 'chrome61',
            minify: mode === 'development' ? false : 'oxc',
            outDir: buildDirectory,
            rollupOptions: {
                input: entries,
                output: {
                    assetFileNames: '[name][extname]',
                    entryFileNames: '[name].js',
                },
            },
            sourcemap: mode === 'development',
        },
        css: {
            preprocessorOptions: {
                scss: {
                    loadPaths: [themeRoot],
                },
            },
        },
    };
});
