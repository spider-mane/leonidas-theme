const mix = require('laravel-mix');

/**
 * Settings
 */
mix
  .setPublicPath('dist')
  .setResourceRoot('src')
  .sourceMaps(true, 'eval-source-map', 'source-map')
  .version()
  .options({});

/**
 * Browsersync
 */
mix.browserSync({proxy: 'leonidas-theme.test'});

/**
 * Javascript
 */
mix
  .js('src/theme/js/index.js', 'dist/theme/js/script.js')
  // .autoload({jquery: ['$', 'window.jQuery']})
  .extract();

/**
 * Sass
 */
mix
  .sass('src/theme/scss/main.scss', 'dist/theme/css/styles.css', {
    sassOptions: {
      outputStyle: 'expanded',
    },
  })
  .options({
    processCssUrls: false,
  });

/**
 * Copies
 */
mix.copy(['src/theme/lib/google-tag-manager.js'], 'dist/theme/lib/');
