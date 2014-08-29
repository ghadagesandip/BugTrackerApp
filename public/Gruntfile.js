module.exports = function(grunt){
    grunt.initConfig({
        pkg :grunt.file.readJSON('package.json'),

        uglify: {
            minifyjs:{
                files :{
                    'js/build/tracker.min.js':[
                        'js/juery.min.js','js/bootstrap.min.js','js/functionscript.js'
                    ]
                }
            }
        },
        concat: {
            concatcss: {
                src: [
                    'css/bootstrap.min.css', 'css/style.css'
                ],
                dest: 'css/build/tracker.css'
            }
        },

        cssmin: {
            minifycss: {
                files: {
                    'css/build/tracker.min.css': 'css/build/tracker.css'
                }
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

}