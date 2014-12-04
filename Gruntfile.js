module.exports = function(grunt) {
 
 // Add your script files here in order of precedence
 
 var scripts = [
  'js/script.js'
 ];
 
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
    imageoptim: {
      src: ['img/'],
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
          cwd: 'img/',
          src: ['*.svg'],
          dest: 'img/',
          ext: '.svg'
        }],
      }
    },
    svg2png: {
      all: {
        files: [{ 
          src: ['img/*.svg'], 
          dest: '.'
        }],
      }
    },
    uglify: {
      options: {
        mangle: false
      },
      my_target: {
        files: {
          'js/script.min.js': scripts
        }
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
        files: scripts,
        tasks: ['uglify'],
        options: {
          livereload: true
        }
      }
    }
  });
 
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-imageoptim');
  grunt.loadNpmTasks('grunt-svg2png');
  grunt.loadNpmTasks('grunt-svgmin');
 
  grunt.registerTask('img', ['svgmin', 'svg2png', 'imageoptim']);
  grunt.registerTask('default', ['sass', 'uglify', 'watch']);
 
};
