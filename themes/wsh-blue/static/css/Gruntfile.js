module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: [{
                    expand: true,
                    cwd: 'scss',
                    src: ['*.scss'],
                    dest: 'stylesheets',
                    ext: '.css'
                }]
            }
        }
    });

    // Load the plugin that provides the "sass" task.
    grunt.loadNpmTasks('grunt-contrib-sass');

    // Default task(s).
    grunt.registerTask('default', ['sass']);

};