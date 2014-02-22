childProcess = require('child_process');
gulp         = require('gulp')
gulputil     = require('gulp-util')
clean        = require('gulp-clean')
sass         = require('gulp-sass')
prefix       = require('gulp-autoprefixer')
coffeelint   = require('gulp-coffeelint')
concat       = require('gulp-concat')
uglify       = require('gulp-uglify')
csso         = require('gulp-csso')
svgo         = require('gulp-svgmin')
modernizr    = require('gulp-modernizr')
browserify   = require('gulp-browserify')
imagemin     = require('gulp-imagemin')
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
path.dist    = 'dist'


# Lint CoffeScript using Coffeelint
gulp.task 'coffeelint', ->
    error  = false
    gulp.src(["#{path.coffee}/**/*.coffee"])
        .pipe(coffeelint("./#{path.coffee}/coffeelint.json"))
        .pipe(coffeelint.reporter())
        .pipe map (file, cb) ->
            if not file.coffeelint.success
                process.exit(1)
            cb(null, file)

# Run our scripts through Browserify
gulp.task 'browserify', ['coffeelint'], ->
    # Save stream in variable
    stream = gulp.src(["#{path.coffee}/**/main.coffee"], read: false)
        .pipe(
            browserify(
                extensions: ['.coffee']
                transform: ['coffeeify']
                debug: not gulputil.env.production
            )
        )
        .pipe(concat('bundle.js'))

    # If building, pass through uglify
    if gulputil.env.production
        stream
            .pipe(concat('bundle.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest("#{path.dist}/#{path.js}"))

    else
        stream.pipe(gulp.dest(path.js))

# Compile SASS
gulp.task 'sass', ->
    # Only compile the two main files
    stream = gulp.src(["#{path.scss}/**/*.scss"])
        .pipe(
            sass(
                includePaths: ['./node_modules', "#{path.public}/bower_components"] # Add a (or multiple) Sass import path.
                #imagePath: path.img
                #sourceComments: 'normal'
            )
        )
        .pipe(prefix('last 2 versions'))

    # Optimize for production
    if gulputil.env.production
        stream = stream.pipe(csso())

    stream.pipe(gulp.dest(if gulputil.env.production then "#{path.dist}/#{path.css}" else path.css))

# Optimize images
gulp.task 'imagemin', ->
    gulp.src(["#{path.img}/**/*.{png,jpg,jpeg,gif}"])
        .pipe(imagemin(progressive: true))
        .pipe(gulp.dest("#{path.dist}/#{path.img}"))

# Optimize SVGs
gulp.task 'svgmin', ->
    gulp.src(["#{path.svg}/**/*.svg"])
        .pipe(svgo())
        .pipe(gulp.dest("#{path.dist}/#{path.svg}"))

# Copy some Laravel folders as-is
gulp.task 'copy', ->
    gulp.src(['**/*'], cwd: 'app')
        .pipe(gulp.dest("#{path.dist}/app"))

# Delete dist folder so build starts fresh
gulp.task 'clean-dist', ->
    gulp.src(path.dist, read: false).pipe(clean())

# Browser Sync
gulp.task 'browser-sync', ->
    childProcess.exec 'php artisan serve --host lightsaber', (err, stdout) ->
        console.log(stdout)

    browserSync.init ["app/views/**/*", "#{path.css}/**/*.css", "#{path.js}/bundle.js"],
        proxy:
            host: 'lightsaber'
            port: 8000

# Modernizr custom build generator
gulp.task 'modernizr', ->
    gulp.src(["#{path.js}/**/*.js", "#{path.css}/**/*.css"])
        .pipe(
            modernizr(options: ['setClasses', 'html5shiv'])
        )
        .pipe(uglify())
        .pipe(gulp.dest("#{path.dist}/#{path.js}/vendor/"))

# Laravel optimized class loader
gulp.task 'laravel-optimize', ->
    childProcess.exec 'php artisan optimize', (err, stdout) ->
        console.log(stdout)

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
    'clean-dist'
    'force-env'
    'laravel-optimize'
    'copy'
    'coffeelint'
    'browserify'
    'sass'
    'imagemin'
    'svgmin'
    'modernizr'
]

