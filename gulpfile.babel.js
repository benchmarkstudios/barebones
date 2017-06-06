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
import runSequence from 'run-sequence';

const log = console.log;
let production = false;

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
  }).on('error', sass.logError))
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
  }).catch(err => log(err.stack));
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
  runSequence(tasks, 'watch-files')
));

gulp.task('build', () => {
  production = true;
  runSequence(tasks);
});

gulp.task('default', () => (
  runSequence(tasks)
));
