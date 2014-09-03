module.exports = function(grunt) {

  var paths = {
    img: 'img/'
  };
 
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    autoprefixer: {
      single_file: {
        options: {
          browsers: ['last 10 version']
        },
        files: { 'style.css': 'style.css' }
      }
    },
    browserify: {
      'js/script.js': ['js/main.js']
    },
    imageoptim: {
      src: [paths.img],
      options: {
        quitAfter: true
      }
    },
    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: { 'style.css': 'scss/style.scss' }
      }
    },
    svgmin: {
      options: {
        plugins: [{
          removeViewBox: false
        }],
      },
      dist: {
        files: [{
          expand: true,
          cwd: paths.img,
          src: ['*.svg'],
          dest: paths.img,
          ext: '.svg'
        }],
      }
    },
    svg2png: {
      all: {
        files: [{ 
          src: [paths.img + '*.svg'], 
          dest: '.'
        }],
      }
    },
    jshint: {
      all: ['js/main.js']
    },
    uglify: {
      all: {
        files: { 'js/script.js': 'js/script.js' }
      }
    },
    watch: {
      css: {
        files: ['scss/**/*.scss'],
        tasks: ['sass', 'autoprefixer'],
        options: {
          livereload: true
        }
      },
      js: {
        files: ['js/main.js'],
        tasks: ['browserify', 'jshint', 'uglify']
      }
    }
  });
 
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-browserify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-imageoptim');
  grunt.loadNpmTasks('grunt-svg2png');
  grunt.loadNpmTasks('grunt-svgmin');
 
  grunt.registerTask('img', ['svgmin', 'svg2png', 'imageoptim']);
  grunt.registerTask('default', ['sass', 'browserify', 'jshint', 'uglify', 'watch']);
 
};
