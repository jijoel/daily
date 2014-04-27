var gulp = require('gulp');
var filter = require('gulp-filter');
var flatten = require('gulp-flatten');
var phpunit = require('gulp-phpunit');
var plumber = require('gulp-plumber');
var clean = require('gulp-clean');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var bower = require('gulp-bower');
var exec = require('child_process').exec;
var sys = require('sys');

var src = './bower_components/';
var dest = './public/vendor/';

gulp.task('bower', ['clean', 'load'], function(){
    var bowerFilesToMove = [
        'angular*/*',
        'bootstrap/dist/**/*',
        'd3/*',
        'jasny-bootstrap/dist/**/*',
        'jcrop/css/*',
        'jcrop/js/*',
        'jquery/dist/*',
        'jquery-autosize/*',
        'jquery-timepicker/dist/*',
        'jquery-ui/ui/minified/*',
        'select2/*',
        'twitter-bootstrap-wizard/jquery*',
        'underscore/*',
        'fontawesome/css/*'
    ];

    bowerFilesToMove.forEach(function(filespec){
        gulp.src(src+''+filespec+'.css')
            .pipe(flatten())
            .pipe(gulp.dest(dest+'css'));
    });

    bowerFilesToMove.forEach(function(filespec){
        gulp.src(src+''+filespec+'.js')
            .pipe(flatten())
            .pipe(gulp.dest(dest+'js'));
    });

    bowerFilesToMove.forEach(function(filespec){
        gulp.src(src+''+filespec+'.map')
            .pipe(flatten())
            .pipe(gulp.dest(dest+'css'))
            .pipe(gulp.dest(dest+'js'));
    });

    gulp.src(src+'jquery-ui/themes/**/*')
        .pipe(gulp.dest(dest+'css/themes'));

    gulp.src(src+'bootstrap/dist/fonts/*')
        .pipe(gulp.dest(dest+'fonts'));

    gulp.src(src+'fontawesome/fonts/*')
        .pipe(gulp.dest(dest+'fonts'));

    gulp.src(src+'jcrop/css/*.gif')
        .pipe(gulp.dest(dest+'css'));

    gulp.src([src+'select2/*.png', src+'select2/*.gif'])
        .pipe(gulp.dest(dest+'css'));

    gulp.src([src+'underscore/underscore.js'])
        .pipe(rename('underscore.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dest+'js'));

});

gulp.task('clean', function(){
    return gulp.src(dest)
        .pipe(clean({force: true}));
});

gulp.task('load', function(){
    return bower();
});

gulp.task('phpunit', function() {
    gulp.src('./app/tests/**/*Test.php')
        .pipe(plumber())
        .pipe(phpunit('phpunit --group=now', {debug:false}))
        .pipe(plumber.stop());
});

gulp.task('watch', function () {
    gulp.watch('app/**/*.php', ['phpunit']);
});

// What tasks does running gulp trigger?
gulp.task('default', ['phpunit']);
