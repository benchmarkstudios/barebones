module.exports = function(grunt) {
 
  grunt.initConfig({
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'img/',
          src: ['*.{png,jpg,gif}'],
          dest: 'img/'
        }]
      }
    },
    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: { 'style.css': 'css/style.scss' }
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
          dest: 'img/' 
        }],
      }
    },
    jshint: {
      all: ['js/*.js']
    },
    uglify: {
      all: {
        files: { 'script.js': 'js/*.js' }
      }
    },
    watch: {
      css: {
        files: ['css/*.scss'],
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
 
 
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-uncss');
  grunt.loadNpmTasks('grunt-svg2png');
  grunt.loadNpmTasks('grunt-svgmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
 
  grunt.registerTask('default', ['imagemin', 'sass', 'svgmin', 'svg2png', 'watch', 'uglify', 'jshint']);
 
};