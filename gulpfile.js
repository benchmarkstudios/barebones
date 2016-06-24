// Disable notifications
// +process.env.DISABLE_NOTIFIER = false;

var gulp = require('gulp');
var gulpImagemin = require('gulp-imagemin');
var elixir = require('laravel-elixir');

// Assets path
elixir.config.assetsPath = 'assets';

// Imagemin
var Task = elixir.Task;
elixir.extend('imagemin', function(src, dest) {
  new Task('imagemin', function() {
    return gulp.src(elixir.config.assetsPath + src)
        .pipe(gulpImagemin())
        .pipe(gulp.dest(dest));
  }).watch(elixir.config.assetsPath + src);
});

// Run elixir tasks
elixir(function(mix) {
    mix.sass('barebones.scss', 'style.css')
       .scripts(['script.js'], 'js/script.min.js')
       .imagemin('/img/**/*', './img');
});
