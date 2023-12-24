const mix = require('laravel-mix');
const yargs = require('yargs');
const argv = yargs(process.argv.slice(2))
  .options({
    openBrowser: {type: 'boolean', default: false},
  })
  .parseSync();

// configuration constants
const root = '..';
const vendor = `${root}/vendor`;
const src = 'src';
const dist = 'dist';
const themeSrc = `${src}/theme`;
const themeDist = `${dist}/theme`;
const themeLib = `${themeDist}/lib`;

mix

  /**
   *==========================================================================
   * Output directory
   *==========================================================================
   *
   *
   *
   */
  .setPublicPath('dist')

  /**
   *==========================================================================
   * Sourcemaps
   *==========================================================================
   *
   *
   *
   */
  .sourceMaps(true, 'eval-source-map', 'source-map')

  /**
   *==========================================================================
   * Versioning
   *==========================================================================
   *
   *
   *
   */
  .version()

  /**
   *==========================================================================
   * Browsersync
   *==========================================================================
   *
   *
   *
   */
  .browserSync({
    proxy: 'leonidas-theme.test',
    open: argv.open ?? false,
    notify: false,
    logLevel: 'debug',
    files: [
      'dist/**/*.js',
      'dist/**/*.css',
      '../app/**/*.php',
      '../boot/**/*.php',
      '../theme/**/*.php',
      '../config/**/*.php',
      '../views/**/*.twig',
    ],
  })

  /**
   *==========================================================================
   * Javascript
   *==========================================================================
   *
   *
   *
   */
  .js('src/theme/js/index.js', 'dist/theme/js/script.js')
  // .autoload({jquery: ['$', 'window.jQuery']})
  .extract()

  /**
   *==========================================================================
   * Typescript
   *==========================================================================
   *
   *
   *
   */
  // .ts('src/theme/ts/index.ts', 'dist/theme/js/script.js')
  // .autoload({jquery: ['$', 'window.jQuery']})
  // .extract()

  /**
   *==========================================================================
   * Sass
   *==========================================================================
   *
   *
   *
   */
  .sass('src/theme/scss/main.scss', 'dist/theme/css/styles.css', {
    sassOptions: {
      outputStyle: 'expanded',
    },
  })

  /**
   *==========================================================================
   * Copies
   *==========================================================================
   *
   *
   *
   */
  .copy('node_modules/bootstrap/dist/js', `${themeLib}/bootstrap`)
  .copy('node_modules/fslightbox/index.js', `${themeLib}/fslightbox`)

  /**
   *==========================================================================
   * Options
   *==========================================================================
   *
   *
   *
   */
  .options({
    processCssUrls: false,
    // imgLoaderOptions: {},
  })

  /**
   *==========================================================================
   * Webpack
   *==========================================================================
   *
   *
   *
   */
  .webpackConfig({
    stats: {
      children: true,
    },
  });
