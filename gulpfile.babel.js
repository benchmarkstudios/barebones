import gulp from 'gulp';
import clean from 'gulp-clean';
import sass from 'gulp-sass';
import gulpif from 'gulp-if';
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

/**
 * Barebones config
 */
import config from './config.barebones';

const { log } = console;
let production = false; // = build
let error = false;

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
 * Clean
 */
gulp.task('clean', () => (
  gulp.src([`${config.base.public}/js`], {
    read: false,
  })
  .pipe(clean())
));

/**
 * Styles
 */
gulp.task('styles', () => {
  const stylesheets = config.styles;
  stylesheets.push(`${config.base.src}/styles/*.scss`);

  gulp.src(stylesheets)
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
    .pipe(gulpif(!production, sourcemaps.write('.')))
    .pipe(gulp.dest(`${config.base.public}`));
});

const roll = (entry, dest) => {
  let env = 'development';
  if (production) {
    env = 'production';
  }

  return rollup({
    entry,
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
          `${config.base.src}/**`,
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
      dest,
    });
  }).catch((err) => {
    notification('Failed to compile scripts. 😱', 'error');
    log(err.stack);
    error = true;
  });
};

gulp.task('scripts', (cb) => {
  if (config.scripts.length) {
    config.scripts.forEach((filePath) => {
      const formattedPath = filePath.replace(/^\/|\/$/g, ''); // remove leading forward slash
      const entry = `${config.base.src}/scripts/${formattedPath}`;
      const dest = `${config.base.public}/js/${formattedPath.replace('.js', '.min.js')}`;
      // regex to remove duplicate forward slashes
      roll(entry.replace(/([^:]\/)\/+/g, '$1'), dest.replace(/([^:]\/)\/+/g, '$1'));
    });
  }
  cb();
});

/**
 * Watch
 */
gulp.task('watch-files', tasks, () => {
  gulp.watch(`${config.base.src}/styles/**/*.scss`, ['styles']);
  gulp.watch(`${config.base.src}/scripts/**/*.js`, ['scripts']);
  gulp.watch(`${config.base.src}/images/**/*.*`, ['images']);
});

/**
 * Images
 */
gulp.task('images', (cb) => {
  // hadle all images that are not svg
  gulp.src(`${config.base.src}/images/**/*.*`)
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{
        removeViewBox: false,
      }],
    }))
    .pipe(gulp.dest(`${config.base.public}/img`))
    .on('end', () => cb());
});

/**
 * Main Tasks
 */
gulp.task('watch', cb => (
  runSequence('clean', () => {
    runSequence(tasks, 'watch-files', () => {
      if (!error) {
        notification('Watching files... 👀');
      }
      cb();
    });
  })
));

gulp.task('build', (cb) => {
  production = true;

  runSequence('clean', () => {
    runSequence(tasks, () => {
      if (!error) {
        notification('Build complete! 🍻');
        cb();
      }
    });
  });
});

gulp.task('default', cb => (
  runSequence('clean', () => {
    runSequence(tasks, () => {
      cb();
    });
  })
));
