var gulp = require('gulp'),
  gutil = require('gulp-util'),
  webserver = require('gulp-webserver'),
  postcss = require('gulp-postcss'),
  autoprefixer = require('autoprefixer'),
  precss = require('precss'),
  //cssnano = require('cssnano'),
  animation = require('postcss-animation'),
  jshint = require('gulp-jshint'),

  source = 'process/css/',
  dest = 'builds/';

gulp.task('html', function() {
  gulp.src(dest + '*.html');
});

gulp.task('css', function() {
  gulp.src(source + 'styles.css')
  .pipe(postcss([
    precss(),
    autoprefixer()
      //,animation()
    //,cssnano()
  ]))
  .on('error', gutil.log)
  .pipe(gulp.dest(dest + 'css'));
});

gulp.task('lint', function() {
    return gulp.src('/builds/js/jQueryScripts.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

gulp.task('watch', function() {
  gulp.watch(source + '**/*.css', ['css']);
  gulp.watch(dest + '**/*.html', ['html']);
  gulp.watch(dest + '**/*.js', ['lint']);
  gulp.watch('/gulpfile.js', ['js']);
});

gulp.task('webserver', function() {
  gulp.src(dest)
    .pipe(webserver({
      livereload: true,
      open: true
    }));
});

gulp.task('default', ['html', 'css', 'webserver','watch']);
gulp.task('lint', ['lint']);
