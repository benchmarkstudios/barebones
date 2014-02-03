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
    watch: {
      css: {
        files: ['css/*.scss', 'css/*/*.scss'],
        tasks: ['sass']
      }
    }
  });
 
 
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
 
  grunt.registerTask('default', ['imagemin', 'sass', 'watch']);
 
};