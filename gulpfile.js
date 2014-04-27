var gulp = require('gulp');
var filter = require('gulp-filter');
var flatten = require('gulp-flatten');
var phpunit = require('gulp-phpunit');
var plumber = require('gulp-plumber');
var clean = require('gulp-clean');
var bower = require('gulp-bower');
var exec = require('child_process').exec;
var sys = require('sys');

gulp.task('bower', ['clean', 'load'], function(){
    var bowerFilesToMove = [
        'angular*/*',
        'bootstrap/dist/*',
        'd3/*.css',
        'jasny-bootstrap/dist/*',
        'jcrop/css/*',
        'jcrop/js/*',
        'jquery/dist/*',
        'jquery-autosize/*',
        'jqueryui/ui/minified/*',
        'select2/*',
        'underscore/*',
        'fontawesome/*'
    ];

    bowerFilesToMove.forEach(function(filespec){
        gulp.src('./bower_components/'+filespec+'.css')
            .pipe(flatten())
            .pipe(gulp.dest('public/vendor/css'));
    });

    bowerFilesToMove.forEach(function(filespec){
        gulp.src('./bower_components/'+filespec+'.js')
            .pipe(flatten())
            .pipe(gulp.dest('public/vendor/js'));
    });

    gulp.src('./bower_components/jqueryui/themes/*')
        .pipe(gulp.dest('public/vendor/css/themes'));

    gulp.src('./bower_components/bootstrap/dist/fonts/*')
        .pipe(gulp.dest('public/vendor/fonts'));

    gulp.src('./bower_components/fontawesome/fonts/*')
        .pipe(gulp.dest('public/vendor/fonts'));

    gulp.src('./bower_components/jcrop/css/*.gif')
        .pipe(gulp.dest('public/vendor/css'));

    gulp.src(['./bower_components/select2/*.png',
            './bower_components/select2/*.png'])
        .pipe(gulp.dest('public/vendor/css'));

});

gulp.task('clean', function(){
    return gulp.src('./public/vendor')
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
