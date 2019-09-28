"use strict";

/* Variables
========================================================= */
const PROJECT_URL = 'http://localhost/startup/',
ROOT              = './',
STYLES_MAIN       = './assets/scss/main.scss',
STYLES_SOURCE     = './assets/scss/**/*.scss',
JS_SOURCE         = './assets/js/src/**/*.js',
JS_DEST           = './assets/js/',
ALL_PHP           = './**/*.php',
BROWSER_VERSIONS  = [
'last 2 version',
'> 1%',
'ie >= 9',
'ie_mob >= 10',
'ff >= 30',
'chrome >= 34',
'safari >= 7',
'opera >= 23',
'ios >= 7',
'android >= 4',
'bb >= 10'
];

/* Plugins
========================================================= */
const gulp   = require('gulp'),
sass         = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
mmq          = require('gulp-merge-media-queries'),
cleanCSS     = require('gulp-clean-css'),
filter       = require('gulp-filter'),
terser       = require('gulp-terser-js'),
plumber      = require('gulp-plumber'),
rename       = require('gulp-rename'),
concat       = require('gulp-concat'),
lineec       = require('gulp-line-ending-corrector'),
notify       = require('gulp-notify'),
browsersync  = require('browser-sync').create();


/* Error Handling
========================================================= */
const onError = function(err) {
  notify.onError({
    title:    "Gulp Error",
    message:  "ERROR:\n\n <%= error.message %>"
  })(err);
};


/* Styles
========================================================= */
function styles() {
  return gulp
  .src( STYLES_MAIN )
  .pipe(plumber( { errorHandler: onError } ))
  .pipe(sass( {
    errLogToConsole: true,
    outputStyle: 'expanded',
    precision: 10
  } ))
    .pipe(mmq( { log: true } )) // Combines Media Queries
    .pipe(cleanCSS({
      format: 'beautify',
      level: {
        2: {
          all: true,
          mergeNonAdjacentRules: false,
          mergeMedia: false
        }
      }
    }))
    .pipe(autoprefixer( BROWSER_VERSIONS ))
    .pipe(lineec() ) // Line Endings for non-UNIX systems
    .pipe(rename( 'style.css' ))
    .pipe(gulp.dest( ROOT ))
    .pipe(filter( 'style.css' )) // Filtering stream to only style.css
    .pipe(rename( { suffix: '.min' } ))
    .pipe(cleanCSS( 'style.min.css' ))
    .pipe(plumber.stop() )
    .pipe(gulp.dest( ROOT ))
    .pipe(browsersync.stream())
  }


/* JS Files
========================================================= */
function scriptsJS() {
  return gulp
  .src( JS_SOURCE )
  .pipe(plumber( { errorHandler: onError } ))
  .pipe(concat( 'all.min.js' ))
  .pipe(terser())
  .pipe(plumber.stop())
  .pipe(gulp.dest( JS_DEST ))
  .pipe(browsersync.stream())
}


/* Browser Sync
========================================================= */
function browserSync(done) {
  browsersync.init({
    proxy: PROJECT_URL,
    port: 3000
  });
  done();
}

function reload(done) {
  browsersync.reload();
  done();
}


/* Watch Tasks
========================================================= */
function watchFiles() {
  gulp.watch( STYLES_SOURCE, styles );
  gulp.watch( JS_SOURCE, scriptsJS );
  gulp.watch( ALL_PHP, reload );
}


/* Build
========================================================= */
const watch = gulp.parallel( watchFiles, browserSync );
const build = gulp.series( gulp.parallel(styles, scriptsJS), watch );

exports.styles  = styles;
exports.js      = scriptsJS;
exports.watch   = watch;
exports.build   = build;

exports.default = build;
