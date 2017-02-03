// Notifications (comment out to disable notifications)
// process.env.DISABLE_NOTIFIER = true;

var gulp = require('gulp');
var elixir = require('laravel-elixir');

// Assets path
elixir.config.assetsPath = 'assets';

// Make autoprefixer support older browsers
elixir.config.css.autoprefix.options.browsers =  ['last 15 versions'];

// Imagemin
var Task = elixir.Task;
elixir.extend('imagemin', function(src, dest) {
  new Task('imagemin', function() {
    var gulpImagemin = require('gulp-imagemin');
    return gulp.src(elixir.config.assetsPath + src)
        .pipe(gulpImagemin())
        .pipe(gulp.dest(dest));
  }).watch(elixir.config.assetsPath + src);
});

// Create a Hash in package.json
elixir.extend('hash', function() {
  new Task('hash', function() {
    var fs = require('fs');
    var fileName = './package.json';
    var file = require(fileName);

    // generate a new hash
    file.hash = ( 0 | Math.random() * 9e6 ).toString(36);
    // save to package.json
    fs.writeFile(fileName, JSON.stringify(file, null, 2), function (err) {
      if (err) return console.log(err);
      console.log('writing to ' + fileName);
    });
  })
});

// Run elixir tasks
elixir(function(mix) {
    mix.sass('barebones.scss', 'style.css')
       .scripts(['script.js'], 'js/script.min.js')
       .imagemin('/images/**/*', './img')
       .hash();
});
