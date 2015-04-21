'use strict'

var gulp = require('gulp'),
    connect  = require('gulp-connect'),
    sass = require('gulp-sass');


gulp.task('connect', function() {
  connect.server({
    port: 8085,
    root: 'app',
    livereload: true
  });
});

gulp.task('sass', function() {
    gulp.src('app/scss/styles.scss')
        .pipe(sass())
        .pipe(gulp.dest('app/css'));
})