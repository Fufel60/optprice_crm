module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        less: {
            guest: {
                options: {
                    compress: true
                },
                files: {
                    "../web/css/styles.min.css": "styles.less"
                }
            }
        },
    });

    grunt.loadNpmTasks('grunt-contrib-less');

    grunt.registerTask('default', ['less']);
};
