var gulp     = require('gulp'),
    concat   = require('gulp-concat'),
    jshint   = require('gulp-jshint'),
    imagemin = require('gulp-imagemin'),
    rename   = require('gulp-rename'),
    sass     = require('gulp-sass'),
    uglify   = require('gulp-uglify'),
    paths    = {
      css: './css/*.scss',
      img: './img/**',
      js:  './js/*.js'
    };
 
gulp.task('sass', function() {
  gulp.src(paths.css)
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(gulp.dest('.'));
});
 
gulp.task('img', function() {
  gulp.src(paths.img)
    .pipe(imagemin())
    .pipe(gulp.dest('./img/'))
});

gulp.task('lint', function() {
  gulp.src(paths.js)
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(gulp.dest('.'));
});

gulp.task('scripts', function() {
  gulp.src(paths.js)
    .pipe(concat('script.js'))
    .pipe(gulp.dest('.'));
    // .pipe(rename('all.min.js'))
    // .pipe(uglify())
    // .pipe(gulp.dest('.'))
});
 
gulp.task('watch', function() {
  gulp.watch(paths.css, ['sass']);
  gulp.watch(paths.js, ['lint', 'scripts']);
});
 
gulp.task('default', ['sass', 'img', 'lint', 'scripts', 'watch']);