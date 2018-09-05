/* Variables
========================================================= */
const PROJECT_URL      = 'http://localhost/NAME/',
//const PROJECT_URL      = 'http://localhost:8080/NAME/',
      ROOT             = './',
      STYLES_MAIN      = 'assets/scss/main.scss',
      STYLES_SOURCE    = 'assets/scss/**/*.scss',
      JS_SOURCE        = 'assets/js/src/*.js',
      JS_DEST          = 'assets/js/',
      IMAGES_SOURCE    = 'assets/img/**/*',
      IMAGES_DEST      = 'assets/img',
      ALL_PHP          = './**/*.php',
      BROWSER_VERSIONS = [
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
let gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifyCSS    = require('gulp-uglifycss'), // Minify CSS
    mmq          = require('gulp-merge-media-queries'),
    filter       = require('gulp-filter'),
    uglifyJS     = require('gulp-uglify'), // Minify JS
    plumber      = require('gulp-plumber'), // Error catcher
    newer        = require('gulp-newer'),
    rename       = require('gulp-rename'),
    concat       = require('gulp-concat'), // Concatenate JS files
    cache        = require('gulp-cache'),
    colors       = require('ansicolors'),
    lineec       = require('gulp-line-ending-corrector'),
    imagemin     = require('gulp-imagemin'),
    browserSync  = require('browser-sync'),
    reload       = browserSync.reload;


/* Error Handling
========================================================= */
let onError = function (err) {
  console.log(colors.red('\n\n*** NOOO SIR, CAN\'T DO! ***\n\n'), colors.magenta(err.message));
};


/* Styles - Task
========================================================= */
gulp.task('styles', function() {

  return gulp.src( STYLES_MAIN )
    .pipe(plumber( { errorHandler: onError } ))
    .pipe(sass( {
      errLogToConsole: true,
      outputStyle: 'expanded',
      precision: 10
    } ))
    .pipe(mmq( { log: true } )) // Combines Media Queries
    .pipe(autoprefixer( BROWSER_VERSIONS ))
    .pipe(lineec() ) // Line Endings for non-UNIX systems
    .pipe(rename('style.css'))
    .pipe(gulp.dest( ROOT ))
    .pipe(filter( 'style.css' )) // Filtering stream to only style.css
    .pipe(rename( { suffix: '.min' } ))
    .pipe(minifyCSS( { maxLineLen: 0 } ))
    .pipe(plumber.stop() )
    .pipe(gulp.dest( ROOT ))
    .pipe(reload( { stream: true } )) // Inject Styles when min style file is created
});


/* JS Files - Task
========================================================= */
gulp.task('scriptsJS', function() {

  return gulp.src( JS_SOURCE )
    .pipe(plumber( { errorHandler: onError } ))
    .pipe(concat('all.min.js'))
    .pipe(uglifyJS() )
    .pipe(plumber.stop() )
    .pipe(gulp.dest( JS_DEST ))
    .pipe(reload( { stream: true } ))
});



/* Images - Task
========================================================= */
gulp.task('images', function() {

  return gulp.src( IMAGES_SOURCE )
    .pipe(plumber( { errorHandler: onError } ))
    .pipe(newer( IMAGES_DEST )) // Pass through newer images only
    .pipe(imagemin([
      imagemin.gifsicle( {interlaced: true} ),
      imagemin.jpegtran( {progressive: true} ),
      imagemin.optipng( {optimizationLevel: 7} ),
      imagemin.svgo({
        plugins: [ // https://github.com/svg/svgo#what-it-can-do
          {removeViewBox: true},
          {removeComments: true},
          {removeTitle: true},
          {removeXMLProcInst: true},
          {cleanupIDs: false}
        ]
      })
    ]))
    .pipe(plumber.stop() )
    .pipe(gulp.dest( IMAGES_DEST ))
});


/* Broswer Sync - Task
========================================================= */
gulp.task( 'browser-sync', function() {

  browserSync.init( {
    proxy: PROJECT_URL,
    open: true,
    online: true,
    host: "192.168.0.145", // your internal IP
    notify: {
      styles: {
        backgroundColor: 'rgba(60, 197, 31, 0.7)',
        borderRadius: '5px 0px 0px',
        bottom: '0',
        top: 'auto',
        color: 'white',
        display: 'block',
        fontSize: '14px',
        margin: '0px',
        padding: '5px 10px',
        position: 'fixed',
        textAlign: 'center',
        zIndex: '9999'
      }
    },
    // Use a specific port
    //port: 8080,
    injectChanges: true
  });
});


/* Watch Tasks
========================================================= */
gulp.task('default', ['styles', 'scriptsJS', 'images', 'browser-sync'], function() {
  gulp.watch( STYLES_SOURCE, [ 'styles' ] );
  gulp.watch( IMAGES_SOURCE, [ 'images' ] );
  gulp.watch( JS_SOURCE, [ 'scriptsJS' ] );
  gulp.watch( ALL_PHP, reload );
});

/* Clear Gulp Cache with [ gulp clear ]
========================================================= */
gulp.task('clear', function () {
  cache.clearAll();
});
