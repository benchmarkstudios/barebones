// Notifications (comment out to disable notifications)
// process.env.DISABLE_NOTIFIER = true;

var gulp = require('gulp');
var gulpImagemin = require('gulp-imagemin');
var elixir = require('laravel-elixir');

// Assets path
elixir.config.assetsPath = 'assets';

// Make autoprefixer support older browsers
elixir.config.css.autoprefix.options.browsers =  ['last 15 versions'];

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
