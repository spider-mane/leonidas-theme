const mix = require("laravel-mix");

/**
 * Settings
 */
mix
  .setPublicPath("dist")
  .setResourceRoot("src")
  .browserSync({ proxy: "leonidas-theme.test" })
  .sourceMaps(true, "eval-source-map", "source-map")
  .version()
  .options({});

/**
 * Scripts
 */
mix.js("src/theme/js/index.js", "dist/theme/js/script.js").extract();

/**
 * Styles
 */
mix
  .sass("src/theme/scss/main.scss", "dist/theme/css/styles.css", {
    sassOptions: {
      outputStyle: "expanded",
    },
  })
  .options({
    processCssUrls: false,
  });

/**
 * Direct Copies
 */
mix.copy(["src/theme/lib/google-tag-manager.js"], "dist/theme/lib/");
