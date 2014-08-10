module.exports = function(grunt) {

  grunt.initConfig({
    pkg : grunt.file.readJSON('package.json'),
    // Concatinating Files Configuration.
    concat : {
      dist : {
        src : [ 'js/custom.js' // All JS in the libs folder
        // 'js/global.js' // This specific file
        ],
        dest : 'js/build/production.js'
      }
    },
    uglify : {
      build : {
        src : 'js/build/production.js',
        dest : 'js/build/production.min.js'
      }
    },
    watch : {
      css : {
        files : [ 'assets/css/*.css', 'index.html' ],
        // tasks : [ 'sass' ],
        options : {
          livereload : {
            port : 9001,
          }
        },
      },
    },
    qunit : {
      all : {
        options : {
          urls : [ 'http://localhost:8000/js/test/test.html' ],

        }
      }
    }
  });

  // Where we tell Grunt we plan to use this plug-in.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-qunit');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-qunit');

  // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  // grunt.registerTask('default', ['concat', 'uglify','qunit']);
  grunt.registerTask('default', [ 'watch', 'qunit' ]);

};
