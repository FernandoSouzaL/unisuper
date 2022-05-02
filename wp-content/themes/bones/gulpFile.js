const gulp = require('gulp');
const { src, dest, watch, series, parallel } = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const terser = require('gulp-terser');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

const paths = {
  styles: {
    src: ['library/sass/*.scss', '!library/sass/_*.scss'],
    dest: 'public/css/',
  },
  scripts: {
    src: ['library/js/main.js'],
    dest: 'public/js/',
  }
};

function compileStyles() {
  return src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.styles.dest));
}

function minifyScripts() {
  return src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(terser().on('error', (error) => console.log(error)))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.scripts.dest));
}

function watcher() {
  watch("library/sass/**/*.scss", parallel(compileStyles));
  watch(paths.scripts.src, parallel(minifyScripts));
}

exports.compileStyles = compileStyles;
exports.minifyScripts = minifyScripts;
exports.watcher = watcher;

exports.default = series(
  parallel(compileStyles, minifyScripts),
  watcher
);