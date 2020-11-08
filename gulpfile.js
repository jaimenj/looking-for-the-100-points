'use strict'

const gulp = require("gulp");
const { parallel } = require("gulp");
const sass = require("gulp-sass");
const cleanCss = require("gulp-clean-css");
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const fs = require('fs-extra');

function css() {
    return gulp.src('./src/scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        //.pipe(cleanCss())
        .pipe(rename('main.min.css'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./css'));
}

function js() {
    return gulp.src([
            './src/js/main.js'
        ])
        .pipe(sourcemaps.init())
        //.pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./js/'));
}

function watchAll() {
    fs.copy('./node_modules/bootstrap/dist/css/bootstrap.min.css', './css/bootstrap.min.css');
    fs.copy('./node_modules/bootstrap/dist/css/bootstrap.min.css.map', './css/bootstrap.min.css.map');

    fs.copy('./node_modules/jquery/dist/jquery.min.js', './js/jquery.min.js');
    fs.copy('./node_modules/popper.js/dist/umd/popper.min.js', './js/popper.min.js');
    fs.copy('./node_modules/popper.js/dist/umd/popper.min.js.map', './js/popper.min.js.map');
    fs.copy('./node_modules/bootstrap/dist/js/bootstrap.min.js', './js/bootstrap.min.js');
    fs.copy('./node_modules/bootstrap/dist/js/bootstrap.min.js.map', './js/bootstrap.min.js.map');

    gulp.watch([
        './src/scss/*',
        './src/js/*'
    ], parallel('css', 'js'));
}

exports.css = css;
exports.js = js;
exports.watch = watchAll;
exports.default = this.watch;