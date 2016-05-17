// Disable notifications
// +process.env.DISABLE_NOTIFIER = false;

var gulp = require('gulp');
var gulpImagemin = require('gulp-imagemin');
var elixir = require('laravel-elixir');

// Assets path
elixir.config.assetsPath = 'assets';

// Imagemin
var Task = elixir.Task;
elixir.extend('imagemin', function(config) {
  new Task('imagemin', function() {
    return gulp.src(elixir.config.assetsPath + '/images/**/*')
        .pipe(gulpImagemin(config))
        .pipe(gulp.dest('./images'));
  }).watch('./assets/images/**/*');
});

// Run elixir tasks
elixir(function(mix) {
    mix.sass('barebones.scss', 'style.css')
       .scripts(['script.js'], 'js/script.min.js')
       .imagemin();
});
