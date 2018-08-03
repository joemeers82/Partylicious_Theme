let gulp         = require('gulp'),
 	browserSync  = require('browser-sync').create(),
 	sass         = require('gulp-sass'),
 	autoprefixer = require('gulp-autoprefixer');



gulp.task('browser-sync', function(){
	let files = [
					"./*.php", 
					"./assets/sass/*.scss", 
					"./**/*.php",
					"./admin/*.php",
					"./includes/*.php",
					"./js/*.js"
				];
	browserSync.init(files,{
		proxy: "localhost:8888/partylicious",
		notify: true
	})
});

gulp.task('sass', function(){
	return gulp 
		.src(["./assets/sass/*.scss"])
		.pipe(sass({outputStyle: "compressed"}))
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(gulp.dest("./build/css/"))
		.pipe(browserSync.stream());
});

gulp.task('reload',function(){
	browserSync.reload();
})

gulp.task('default', ['sass', 'browser-sync'], function() {
	gulp.watch('./assets/sass/*.scss',['sass']);
	gulp.watch('.*.php',['reload']);

})


