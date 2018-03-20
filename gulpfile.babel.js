const gulp          = require('gulp');
const less          = require('gulp-less');
const babel         = require('gulp-babel');
const concat        = require('gulp-concat');
const uglify        = require('gulp-uglify');
const rename        = require('gulp-rename');
const cleanCSS      = require('gulp-clean-css');
const sourcemaps    = require('gulp-sourcemaps');
const gutil         = require('gulp-util');
const del           = require('del');
const babelify      = require('babelify');
const browserify    = require('browserify');
const watchify      = require('watchify');
const source        = require('vinyl-source-stream');
const buffer        = require('vinyl-buffer');
const glob          = require('glob');
const es            = require('event-stream');
const exec          = require('child_process').exec;
const browserSync   = require('browser-sync').create();

const paths = {
  styles: {
    src: 'fseinventory/css/*.css',
    dest: 'fseinventory/dist/css/'
  },
  scripts: {
    src: 'fseinventory/js/**.js',
    dest: 'fseinventory/dist/js/'
  },
  application: {
    src: 'fseinventory/application/**/*.(php|html)'
  }
};


export const clean = () => del([ 'fseinventory/dist' ]);

export function styles() {
  return gulp.src(paths.styles.src)
    // .pipe(less())
    .pipe(cleanCSS())
    // pass in options to the stream
    //.pipe(rename({
    //  basename: 'main',
    //  suffix: '.min'
    //}))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(browserSync.stream());
}

export function scripts(done) {
    glob(paths.scripts.src, function(err, files) {
        if (err) done(err);
        const tasks = files.map(function(entry) {
            const [file, ...rest] = entry.split('/').reverse();
            return browserify({
                    entries: [entry],
                    cache: {},
                    packageCache: {},
                    debug: true,
                    plugin: [watchify],
                    transform: ['babelify']
                })
                .bundle()
                .on("error", err => {
                    gutil.log("Browserify Error", gutil.colors.red(err.message));
                    done(err);
                })
                .pipe(source(file))
                // .pipe(rename({
                //     extname: '.js'
                // }))
                .pipe(buffer())
                .pipe(sourcemaps.init({loadMaps: true}))
                .pipe(uglify())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest(paths.scripts.dest));
        });
        es.merge(tasks).on('end', done);
    });

    // return gulp.src(paths.scripts.src, { sourcemaps: true })
    // .pipe(babel())
    // .pipe(uglify())
    // // .pipe(concat('main.min.js'))
    // .pipe(gulp.dest(paths.scripts.dest));
}

export function scriptsWatch(done) {
    glob(paths.scripts.src, function(err, files) {
        if (err) done(err);
        const tasks = files.map(function(entry) {
            const [file, ...rest] = entry.split('/').reverse();
            const b = browserify({
                entries: [entry],
                cache: {},
                packageCache: {},
                debug: true,
                plugin: [watchify],
                transform: ['babelify']
            });

            b.on('update', gulp.series(bundle, reload)).on('log', (msg) => console.log(msg));
            return bundle();

            function bundle() {
                return b.bundle()
                .on("error", err => {
                    gutil.log("Browserify Error", gutil.colors.red(err.message));
                    done(err);
                })
                .pipe(source(file))
                .pipe(buffer())
                .pipe(sourcemaps.init({loadMaps: true}))
                .pipe(uglify())
                .pipe(sourcemaps.write('./maps'))
                .pipe(gulp.dest(paths.scripts.dest));
            }
        });
        es.merge(tasks).on('end', done);
    });
}

function serve(done) {
    browserSync.init({
        proxy: "localhost:8000"
    });
    done();
}

function watch() {
  // gulp.watch(paths.scripts.src, gulp.series(scripts, reload));
  gulp.watch(paths.styles.src, gulp.series(styles));
  gulp.watch(paths.application.src, reload);
}

function reload(done) {
    // exec('docker restart fseinventory_myapp_1', function(err, stdout, stderr) {});
    browserSync.reload();
    done();
}

gulp.task('watch', gulp.series(clean, styles, scriptsWatch, serve, watch));

const build = gulp.series(clean, gulp.parallel(styles, scripts));
gulp.task('build', build);

export default build;