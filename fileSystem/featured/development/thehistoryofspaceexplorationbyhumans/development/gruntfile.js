module.exports = function(grunt){
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-connect');
	//grunt.loadNpmTasks('grunt-connect-livereload');
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		connect: {
			server: {
				options: {
					port: 9001,
					base: '.'
				}//end options
			}//end server
		}, //end the connect
		uglify: {
			my_target:{
				files: {
					'_/js/scripts.js': ['_/components/js/scripts.js'] //,
					// '_/js/testCanvas.js': ['_/components/js/testCanvas.js']
					
				}//end files 
			}//end My Target
		},//end uglify
		jshint: {
			files: ['_/components/js/*.js', 'gruntfile.js'],
			options: {
				globals: {
					jQuery: true,
					console: true,
          			module: true
        		}//end globals 
			}///end options
		},//end jshint
		compass: {
			dev: {
				options: {
					config: 'config.rb'
				} //options
			} //dev
		}, //compass
	    autoperfixer: {
			dist: {
				files: {
					'_/components/sass/*.scss': '_/css/styles.css'
				}//end files
			}//end dist 
		},// end autoperfixer
		watch: {
			options: { livereload: true},
			scripts: {
				files: ['_/components/js/*.js', 'gruntfile.js'],
				tasks: ['uglify']
			},//end scripts
			sass: {
				files: ['_/components/sass/*.scss'],
				tasks: ['compass:dev']
			},//end sass
			styles: {
				files: ['_/css/*.css'],
				tasks: ['autoprefixer']
			},//end styles
			html: {
				files: ['*.html'],
				options: { livereload: true}
			}//end html
		}//end watch
	});//end initCofig
	grunt.registerTask('test', 'jshint');
	grunt.registerTask('default', ['connect', 'watch']);
};// end grunt