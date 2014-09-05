var gulp       = require('gulp');
var livereload = require('gulp-livereload');
var sass       = require('gulp-ruby-sass');

var paths = {
  scss: ['app/assets/scss/**/*.scss'],
  dest: 'public/css',
  watch: ['app/Up3/**/*.php', 'app/controllers/**/*.php', 'app/models/**/*.php', 'app/views/**/*.php']
};

gulp.task('scss', function(){
  return gulp.src(paths.scss)
    .pipe(sass({
              style: 'compact',
              sourcemap: true,
              sourcemapPath: '../app/assets/scss',
              lineComments: true,
              debugInfo: true
            }))
    .on('error', function(err) { console.log( err.message ); })
    .pipe(gulp.dest(paths.dest));
});

gulp.task('watch', function(){
  livereload.listen();
  gulp.watch(paths.scss, ['scss']);
  gulp.watch('public/css/**').on('change', livereload.changed);
  gulp.watch(paths.watch).on('change', livereload.changed);
});

gulp.task('default', ['watch', 'scss']);
