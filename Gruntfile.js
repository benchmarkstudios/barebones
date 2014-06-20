module.exports = function(grunt) {

  var paths = {
    img: 'img/'
  };
 
  grunt.initConfig({
    compass: {
      options: {
        config: 'config.rb',  
        bundleExec: true
      },
      dev: {
        options: {
          specify: 'scss/style.scss',
        }
      },
      prod: {}
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
          dest: paths.img
        }],
      }
    },
    jshint: {
      all: ['js/script.js']
    },
    uglify: {
      all: {
        files: { 'script.js': 'js/*.js' }
      }
    },
    watch: {
      css: {
        files: ['scss/**/*.scss'],
        tasks: ['sass'],
        options: {
          livereload: true
        }
      },
      js: {
        files: ['js/*.js'],
        tasks: ['uglify', 'jshint']
      }
    }
  });
 
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-imageoptim');
  grunt.loadNpmTasks('grunt-svg2png');
  grunt.loadNpmTasks('grunt-svgmin');
 
  grunt.registerTask('default', ['imageoptim', 'sass', 'svgmin', 'svg2png', 'watch', 'uglify', 'jshint']);
 
};
