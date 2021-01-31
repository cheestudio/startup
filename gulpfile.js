"use strict";


/* Project VARs
========================================================= */
const
PROJECT_NAME   = 'FOLDERNAME',
DEVELOPER_MODE = true,

ROOT           = './',
STYLES_MAIN    = './assets/scss/main.scss',
STYLES_SOURCE  = './assets/scss/**/*.scss',
JS_SOURCE      = ['./assets/js/src/plugins.js','./assets/js/src/**/*.js'],
JS_DEST        = './assets/js/',
SVG_SOURCE     = './assets/img/svg/*.svg',
ALL_IMAGES     = './assets/img/*.{png,jpg,jpeg,gif}',
ALL_PHP        = './**/*.php';


/* Plugin VARs
========================================================= */
const { src, dest, watch, series, parallel } = require('gulp'),
autoprefixer = require('gulp-autoprefixer'),
cleancss     = require('gulp-clean-css'),
concat       = require('gulp-concat'),
filter       = require('gulp-filter'),
lineec       = require('gulp-line-ending-corrector'),
mmq          = require('gulp-merge-media-queries'),
notify       = require('gulp-notify'),
plumber      = require('gulp-plumber'),
rename       = require('gulp-rename'),
sass         = require('gulp-sass'),
sassglob     = require('gulp-sass-glob'),
gulpif       = require('gulp-if'),
terser       = require('gulp-terser-js'),
browsersync  = require('browser-sync').create();


/* Error Handling
========================================================= */
var onError = function(err) {
  notify.onError({
    title:    "Error:",
    message:  "<%= error.message %>"
  })(err);

  this.emit('end');
};


/* SCSS Styles
========================================================= */
function styles() {
  return src( STYLES_MAIN )
  .pipe( plumber( { errorHandler: onError } ) )
  .pipe( sassglob() )
  .pipe( sass() )
  .pipe( autoprefixer() )
  .pipe( mmq( { log: true } ) )
  .pipe( cleancss({
    format: 'beautify',
    level: {
      1: {
        roundingPrecision: 'all=10, px=2, em=2, rem=2, font-size=2, line-height=2'
      },
      2: {
        mergeNonAdjacentRules: false,
        mergeMedia: false
      }
    }
  }))
  .pipe( lineec() )
  .pipe( rename( 'style.css' ) )
  .pipe( dest( ROOT ) )
  .pipe( filter( 'style.css' ) )
  .pipe( rename( { suffix: '.min' } ) )
  .pipe( cleancss( { level: 0 } ) )
  .pipe( plumber.stop() )
  .pipe( dest( ROOT ) )
  .pipe( gulpif( DEVELOPER_MODE, browsersync.stream() ) )
}


/* JS Files
========================================================= */
function scriptsJS() {
  return src( JS_SOURCE )
  .pipe( plumber( { errorHandler: onError } ) )
  .pipe( concat( 'all.min.js' ) )
  .pipe( terser() )
  .pipe( plumber.stop() )
  .pipe( dest( JS_DEST ) )
}


/* BrowserSync
========================================================= */
function browserSyncInit(done) {
  browsersync.init({
    proxy: 'localhost/' + PROJECT_NAME,
    notify: false
  });
  done();
}

function reload(done) {
  browsersync.reload();
  done();
}


/* Watch Tasks
========================================================= */
function watchFiles(done) {
  watch( STYLES_SOURCE, styles );

  if ( DEVELOPER_MODE ) {
    watch( ALL_PHP, reload );
    watch( ALL_IMAGES, reload );
    watch( JS_SOURCE, series(scriptsJS, reload) );
    watch( SVG_SOURCE, { events: ['add', 'change'] }, reload );
  }
  else {
    watch( JS_SOURCE, scriptsJS );
  }
  done();
}


/* Build
========================================================= */
if ( DEVELOPER_MODE ) {
  var build  = parallel( styles, scriptsJS, watchFiles, browserSyncInit );
} else {
  var build  = parallel( styles, scriptsJS, watchFiles );
}

exports.default = build;