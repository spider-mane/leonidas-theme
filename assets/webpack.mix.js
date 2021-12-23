const mix = require("laravel-mix");

mix
  .setPublicPath("dist")
  .setResourceRoot("src")
  // .js('js/index.js', 'js')
  .ts("ts/index.ts", "js")
  .sass("sass/styles.css", "css");
