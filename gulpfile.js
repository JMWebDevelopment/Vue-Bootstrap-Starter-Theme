// Grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber'),
    bower = require('gulp-bower'),
    merge = require('merge-stream');
    
// Compile Sass, Autoprefix and minify
gulp.task('styles', function() {
  var places = ['./src/assets/scss/*.scss', './src/assets/scss/style.scss'];

  var tasks = places.map(function(element) {
      if ( element === './src/assets/scss/style.scss' ) {
          return gulp.src('./src/assets/scss/style.scss')
              .pipe(sass({includePaths: ['./bower_components/bootstrap/scss']}).on('error', sass.logError))
              .pipe(gulp.dest(''))
      } else {
          return gulp.src('./src/assets/scss/*.scss')
              .pipe(sass({includePaths: ['./bower_components/bootstrap/scss']}).on('error', sass.logError))
              .pipe(gulp.dest('./src/assets/css/'))
      }
  });

  return merge(tasks);
});    
    
// JSHint, concat, and minify JavaScript
gulp.task('site-js', function() {
  return gulp.src([	
	  
           // Grab your custom scripts
  		  './assets/js/scripts/*.js'
  		  
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('./assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./assets/js'))
});    

// JSHint, concat, and minify Foundation JavaScript
gulp.task('bootstrap-js', function() {
  return gulp.src([	
  		  
  		  // Foundation core - needed if you want to use any of the components below
          './bower_components/bootstrap/js/dist/alert.js',
      './bower_components/bootstrap/js/dist/button.js',
      './bower_components/bootstrap/js/dist/carousel.js',
      './bower_components/bootstrap/js/dist/collapse.js',
      './bower_components/bootstrap/js/dist/dropdown.js',
      './bower_components/bootstrap/js/dist/modal.js',
      './bower_components/bootstrap/js/dist/popover.js',
      './bower_components/bootstrap/js/dist/scrollspy.js',
      './bower_components/bootstrap/js/dist/tab.js',
      './bower_components/bootstrap/js/dist/tooltip.js',
      './bower_components/bootstrap/js/dist/util.js'
  ])
    .pipe(concat('bootstrap.js'))
    .pipe(gulp.dest('./src/assets/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./src//assets/js'))
});

// Update Foundation with Bower and save to /vendor
gulp.task('bower', function() {
  return bower({ cmd: 'update'})
    .pipe(gulp.dest('vendor/'))
});    

// Create a default task 
gulp.task('default', function() {
  gulp.start('styles', 'site-js', 'foundation-js');
});

// Watch files for changes
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']);

});
