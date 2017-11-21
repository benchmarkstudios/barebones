/* eslint-disable no-console */
import gulp from 'gulp';
import clean from 'gulp-clean';
import sass from 'gulp-sass';
import gulpif from 'gulp-if';
import rename from 'gulp-rename';
import autoprefixer from 'gulp-autoprefixer';
import sourcemaps from 'gulp-sourcemaps';
import { rollup } from 'rollup';
import buble from 'rollup-plugin-buble';
import nodeResolve from 'rollup-plugin-node-resolve';
import commonjs from 'rollup-plugin-commonjs';
import json from 'rollup-plugin-json';
import replace from 'rollup-plugin-replace';
import multiEntry from 'rollup-plugin-multi-entry';
import uglify from 'rollup-plugin-uglify';
import { minify } from 'uglify-js';
import imagemin from 'gulp-imagemin';
import notify from 'gulp-notify';
import runSequence from 'run-sequence';
import path from 'path';

const log = console.log;
let production = false;
let error = false;

/**
 * Config
 */
const config = {
    src: './assets',
    public: './',
};

/**
 * Tasks - in order
 */
const tasks = ['styles', 'scripts', 'images'];

/**
 * Notification
 *
 * @param {string} message
 * @param {string} status
 */
function notification(message = '', status = 'success') {
    return gulp.src('./node_modules/gulp-notify/test/fixtures/1.txt')
        .pipe(notify({
            title: 'Barebones',
            message,
            icon: path.join(__dirname, `assets/icons/${status}.png`),
        }));
}

/**
 * Styles
 */
gulp.task('clean-styles', () => (
    gulp.src(`${config.public}/css`, {
        read: false,
    })
        .pipe(clean())
));

gulp.task('styles', ['clean-styles'], () => (
    gulp.src([`${config.src}/styles/*.scss`])
        .pipe(gulpif(!production, sourcemaps.init()))
        .pipe(sass({
            outputStyle: production ? 'compressed' : 'nested',
        }).on('error', (err) => {
            notification('Failed to compile styles. 😱', 'error');
            log(err.stack);
            error = true;
        }))
        .pipe(autoprefixer({
            browsers: ['last 10 versions'],
        }))
        .pipe(rename({
            suffix: '.min',
        }))
        .pipe(gulpif(!production, sourcemaps.write('.')))
        .pipe(gulp.dest(`${config.public}/css`))
));

/**
 * Scripts
 */
gulp.task('clean-scripts', () => (
    gulp.src(`${config.public}/js`, {
        read: false,
    })
        .pipe(clean())
));

gulp.task('scripts', ['clean-scripts'], () => {
    let env = 'development';
    if (production) {
        env = 'production';
    }

    rollup({
        entry: `${config.src}/scripts/scripts.js`,
        plugins: [
            multiEntry(),
            buble(),
            nodeResolve({
                browser: true,
                main: true,
                jsnext: true,
            }),
            commonjs({
                include: [
                    'node_modules/**',
                    `${config.src}/**`,
                ],
            }),
            json(),
            replace({
                'process.env.NODE_ENV': JSON.stringify(env),
            }),
            production ? uglify({}, minify) : '',
        ],
    }).then((bundle) => {
        bundle.write({
            format: 'iife',
            moduleName: 'BarebonesBundle',
            sourceMap: !production,
            dest: `${config.public}/js/script.min.js`,
        });
    }).catch(err => {
        notification('Failed to compile scripts. 😱', 'error');
        log(err.stack);
        error = true;
    });
});

/**
 * Watch
 */
gulp.task('watch-files', tasks, () => {
    gulp.watch(`${config.src}/styles/**/*.scss`, ['styles']);
    gulp.watch(`${config.src}/scripts/**/*.js`, ['scripts']);
    gulp.watch(`${config.src}/images/**/*.*`, ['images']);
});

/**
 * Images
 */
gulp.task('images', () => {
    // hadle all images that are not svg
    gulp.src(`${config.src}/images/**/*.*`)
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{
                removeViewBox: false,
            }],
        }))
        .pipe(gulp.dest(`${config.public}/img`));
});

/**
 * Main Tasks
 */
gulp.task('watch', () => (
    runSequence(tasks, 'watch-files', () => {
        if (!error) {
            notification('Watching files... 👀');
        }
    })
));

gulp.task('build', () => {
    production = true;
    runSequence(tasks, () => {
        if(!error) {
            notification('Build complete! 🍻');
        }
    });
});

gulp.task('default', () => (
    runSequence(tasks)
));
