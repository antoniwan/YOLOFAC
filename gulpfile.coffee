childProcess = require('child_process');
gulp         = require('gulp')
gulputil     = require('gulp-util')
clean        = require('gulp-clean')
sass         = require('gulp-ruby-sass')
prefix       = require('gulp-autoprefixer')
concat       = require('gulp-concat')
uglify       = require('gulp-uglify')
browserify   = require('gulp-browserify')
plumber      = require('gulp-plumber')
browserSync  = require('browser-sync')
map          = require('map-stream')

# Common paths
path         = {}
path.public  = 'content'
path.assets  = 'assets'
path.coffee  = path.assets + '/coffee'
path.scss    = path.assets + '/scss'
path.img     = path.public + '/img'
path.svg     = path.public + '/svg'
path.js      = path.public + '/js'
path.css     = path.public + '/css'
path.bower   = path.public + '/bower_components'
path.views   = 'app/views'
path.dist    = 'dist'


# Run our scripts through Browserify
gulp.task 'browserify', ->
    # Save stream in variable
    stream = gulp.src(["#{path.coffee}/**/main.coffee"], read: false)
        .pipe(plumber())
        .pipe(
            browserify(
                extensions: ['.coffee']
                transform: ['coffeeify']
                debug: not gulputil.env.production
                shim:
                    "jquery":
                        path: "#{path.bower}/jquery/dist/jquery.js"
                        exports: "$"
                    "foundation":
                        path: "#{path.bower}/foundation/js/foundation.js"
                        exports: null
                    "foundation.topbar":
                        path: "#{path.bower}/foundation/js/foundation/foundation.topbar.js"
                        exports: null
                    "foundation.reveal":
                        path: "#{path.bower}/foundation/js/foundation/foundation.reveal.js"
                        exports: null
                    "jquery.ui.widget":
                        path: "#{path.bower}/blueimp-file-upload/js/vendor/jquery.ui.widget.js"
                        exports: null
                    "blueimp.fileupload":
                        path: "#{path.bower}/blueimp-file-upload/js/jquery.fileupload.js"
                        exports: null
                    "sticky-kit":
                        path: "#{path.bower}/sticky-kit/jquery.sticky-kit.js"
                        exports: null
            )
        )

    # If building, pass through uglify
    if gulputil.env.production
        stream
            .pipe(concat('bundle.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest("#{path.dist}/#{path.js}"))

    else
        stream
            .pipe(concat('bundle.js'))
            .pipe(gulp.dest(path.js))

# Compile SASS
gulp.task 'sass', ->
    # Only compile the two main files
    stream = gulp.src(["#{path.scss}/styles.scss"])
        .pipe(plumber())
        .pipe(
            sass(
                loadPath: [path.bower] # Add a (or multiple) Sass import path.
                quiet: true
                style: 'compressed'
            )
        )
        .pipe(prefix('last 2 versions'))
        .pipe(gulp.dest(path.css))

    # Optimize for production
    if gulputil.env.production
        stream = stream
            .pipe(plumber())
            .pipe(csso())
            .pipe(gulp.dest("#{path.dist}/#{path.css}"))

# Browser Sync
gulp.task 'browser-sync', ->
    # childProcess.exec 'php artisan serve --host yoloforacause', (err, stdout) ->
    #     console.log(stdout)

    browserSync.init ["app/views/**/*", "#{path.css}/**/*.css", "#{path.js}/bundle.js"],
        proxy:
            host: 'yoloforacause'
            port: 8888

# The Watchers
gulp.task 'watcher', ->
    gulp.watch "#{path.coffee}/**/*.coffee", ['browserify']
    gulp.watch "#{path.scss}/**/*.scss", ['sass']

# Development server
gulp.task 'serve', ['sass', 'browserify', 'browser-sync', 'watcher']

# Initialize app
gulp.task 'init', ->
    # Install Bower components
    childProcess.exec 'bower install', (err, stdout) ->
        console.log(stdout)
    # Install Composer packages for Laravel
    childProcess.exec 'composer install --prefer-dist', (err, stdout) ->
        console.log(stdout)

# Deployment task
gulp.task 'force-env', -> gulputil.env.production = true
gulp.task 'default', [
    'coffeelint'
    'browserify'
    'sass'
]
