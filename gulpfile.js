var gulp                = require("gulp"),
    plumber             = require('gulp-plumber'),
    notify              = require('gulp-notify'),
    compass             = require('gulp-compass'),
    autoprefixer        = require("gulp-autoprefixer"),
    gcmq                = require('gulp-group-css-media-queries'),
    cssnano             = require("gulp-cssnano"),
    sass                = require("gulp-sass"),
    stripCssComments    = require('gulp-strip-css-comments'),
    concat              = require('gulp-concat'),
    rename              = require('gulp-rename');


/**
 * Declare the project folders
 * @type {{src: string, dist: string, build: string}}
 */
var dirs = {
    src: './src',
    dist: '.',
    build: './build'
};


gulp.task( 'compass', function () {

    return gulp.src( dirs.src + '/compass/**/*.scss' )
        .pipe( plumber({ errorHandler: function(err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message:  err.toString()
            })(err);
        }}) )
        .pipe( compass({
            config_file: './config.rb',
            css: dirs.src + '/tmp',
            sass: dirs.src + '/compass'
        }) )
        .pipe( gulp.dest(dirs.src + '/tmp') );

});


gulp.task( 'sass', function () {

    return gulp.src([
        dirs.src + '/sass/**/*.scss',
        '!' + dirs.src + '/sass/editor-style.scss'
    ])
        .pipe( plumber({ errorHandler: function(err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message:  err.toString()
            })(err);
        }}) )
        .pipe( sass() )
        .pipe( autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }) )
        .pipe( gulp.dest(dirs.src + '/tmp') );

});


gulp.task( 'style', ['compass', 'sass'], function () {

    return gulp.src([
        dirs.src + '/tmp/parent_style.css',
        dirs.src + '/tmp/style.css'
    ])
        .pipe( plumber({ errorHandler: function(err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message:  err.toString()
            })(err);
        }}) )
        .pipe( gcmq() )
        .pipe( stripCssComments({preserve: false}) )
        .pipe( cssnano() )
        .pipe( concat('style.css') )
        .pipe( gulp.dest(dirs.dist + '/stylesheets') )
        .pipe( notify({ message: 'Theme Styles task completed', onLast: true }) );

});