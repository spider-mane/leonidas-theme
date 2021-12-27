/**
 * @typedef {import('@roots/bud').Bud} Bud
 *
 * @param {Bud} config
 */

module.exports = async (config) =>
  config
    /**
     * Application entrypoints
     *
     * Paths are relative to your assets directory
     */
    .entry({
      theme: ["js/theme/index.js", "cs/theme/style.css"],
      admin: ["js/admin/index.js", "cs/admin/style.css"],
    })

    /**
     * These files should be processed as part of the build
     * even if they are not explicitly imported in application assets.
     */
    .assets(["assets/**/images"])

    /**
     * These files will trigger a full page reload
     * when modified.
     */
    .watch(["assets/**/scss/*.scss", "views/**/*.twig", "theme/**/*.php"])

    /**
     * Target URL to be proxied by the dev server.
     *
     * This is your local dev server.
     */
    .proxy("http://leonidas.test");
