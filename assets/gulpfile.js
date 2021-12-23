const fs = require("fs");
const del = require("del");
const path = require("path");
const gulp = require("gulp");
const glob = require("glob");
const merge2 = require("merge2");
const globby = require("globby");
const gzip = require("gulp-gzip");
const newer = require("gulp-newer");
const notify = require("gulp-notify");
const plumber = require("gulp-plumber");
const deleteEmpty = require("delete-empty");
const sourcemaps = require("gulp-sourcemaps");
const environments = require("gulp-environments");
const browserSync = require("browser-sync").create();

// css
const sass = require("gulp-sass");
const cssnano = require("cssnano");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const postcssPresetEnv = require("postcss-preset-env");

// js
const babel = require("gulp-babel");
const webpack = require("webpack-stream");
const uglify = require("gulp-uglify");

//img
const sharp = require("sharp");
// const sizeOf = require("image-size");
// const imagemin = require("gulp-imagemin");
// const imageResize = require("gulp-image-resize");

// ############################## Config ##############################

// Deps
sass.compiler = require("node-sass");
const dev = environments.development;
const prod = environments.production;

// Base
const env = prod() ? 'production' : 'development';
const projectURL = 'http://webtheorystudio.test';
const publicDir = './theme/';
const assets = publicDir + 'assets/';
const assetSrc = assets + 'src/';
const assetDist = assets + 'dist/';

// Styles
const styleSrcDir = assetSrc + 'scss/';
const styleSrcFile = 'styles.scss';
const styleDistDir = assetDist + 'styles/';
const styleDistFile = 'styles.css';

// Scripts
const jsSrcDir = assetSrc + 'js/';
const jsSrcFile = 'index.js';
const jsDistDir = assetDist + 'scripts/';
const jsDistFile = 'script.js';

// Images
const imgDistDir = assetDist + 'images/';
const imgSrcDir = assetSrc + 'images/';
const iconSrcDir = assetSrc + 'icons/';
const iconDistDir = assetDist + 'icons/';
const logoSrcDir = assetSrc + 'logos/';
const logoDistDir = assetDist + 'logos/';

// Watch
const phpWatch = ['./**/*.php', '!vendor/**', '!node_modules/**'];
const twigWatch = publicDir + 'views/**/*.twig';
const scssWatch = `${styleSrcDir}**/*.scss`;
const jsSrcWatch = `${jsSrcDir}**/*.js`;
const cssWatch = `${styleDistDir}**/*.css`;
const jsWatch = `${jsDistDir}**/*.js`;
const imgSrcWatch = `${imgSrcDir}**/*.+(jpeg|jpg|png|tiff|webp)`;
const copySrcWatch = [iconSrcDir, logoSrcDir];
const reloadWatch = [...phpWatch, cssWatch, jsWatch, twigWatch];
const watchIgnore = ['vendor/**', 'node_modules/**'];

// Other
const defaultBrowser = "C:\\Program Files (x86)\\Google\\Chrome Dev\\Application\\chrome.exe";

const config = {

  gulp: {

    watch: {

      global: {
        // usePolling: true
      }
    }
  },

  sass: {
    outputStyle: dev() ? 'expanded' : 'compressed',
  },

  postcss: {},

  autoprefixer: {},

  cssnano: {
    preset: ['default', {
      discardComments: { removeAll: true }
    }]
  },

  presetEnv: {},

  webpack: {
    mode: dev() ? 'development' : 'none',
    output: {
      filename: jsDistFile
    }
  },

  // webpack: require("./webpack.config"),

  babel: {
    "presets": [
      [
        "@babel/env",
        {
          "targets": {
            "browsers": [
              "last 5 versions",
              "ie >= 8"
            ]
          }
        }
      ]
    ]
  },

  uglify: {},

  browserSync: {
    proxy: projectURL,
    notify: false,
    reloadOnRestart: true,
    open: false,
    browser: defaultBrowser,
    ghostMode: {
      forms: false,
    }
  },

  sharp: {
    fit: 'cover',
    position: 'center',
    kernel: 'mitchell',
    fastShrinkOnLoad: false,
    withoutEnlargement: true
  },

  imgOpt: {
    transforms: [
      {
        width: 600,
        height: 400,
      }, {
        width: 1200,
        height: 800,
      }, {
        width: 1800,
        height: 1200,
      }, {
        width: 1920,
        height: 1920,
      }
    ],

    widths: [1920, 1280, 640]
  },

  copy: [
    { src: iconSrcDir, dist: iconDistDir },
    { src: logoSrcDir, dist: logoDistDir },
  ],
}

// ############################## Functions ##############################

/**
 * error
 */
function error(err) {
  notify.onError({
    title: "Gulp error in " + err.plugin,
    message: err.toString()
  })(err);
}

/**
 *
 */
function copy(cb) {

  config.copy.forEach(thing => {
    gulp.src(thing.src + '**/*')
      .pipe(newer(thing.dist))
      .pipe(gulp.dest(thing.dist));
  })

  cb();
}

/**
 * launch browsersync proxy server
 */
function watch() {

  // launch proxy
  browserSync.init(config.browserSync);
  options = config.gulp.watch.global;

  // watch for souce changes
  gulp.watch(jsSrcWatch, options, exports.js);
  gulp.watch(scssWatch, options, exports.sass);
  gulp.watch(imgSrcWatch, options, exports.sharp);
  gulp.watch(copySrcWatch, options, exports.copy);

  // reload browser
  gulp.watch(reloadWatch, options).on('change', browserSync.reload);
}

/**
 * compile sass using gulp/node-sass
 */
function compileSass() {

  const srcEntry = styleSrcDir + styleSrcFile;

  const postcssPlugins = [];

  if (prod()) {
    postcssPlugins.push(
      autoprefixer(config.autoprefixer),
      cssnano(config.cssnano),
      postcssPresetEnv(config.presetEnv)
    );
  }

  return gulp.src(srcEntry)
    .pipe(plumber())
    .pipe(dev(sourcemaps.init()))
    .pipe(sass(config.sass).on('error', sass.logError))
    .pipe(dev(sourcemaps.write('.')))
    .pipe(prod(postcss(postcssPlugins)))
    // .pipe(prod(gzip(config.gzip)))
    .pipe(gulp.dest(styleDistDir))
    .pipe(browserSync.stream());
}

/**
 * compile javascript using webpack
 */
function compileJs() {

  return gulp.src(jsSrcDir + jsSrcFile)
    .pipe(plumber())
    .pipe(dev(sourcemaps.init()))
    .pipe(webpack(config.webpack))
    .pipe(dev(sourcemaps.write('.')))
    .pipe(prod(babel(config.babel)))
    .pipe(prod(uglify(config.uglify)))
    // .pipe(prod(gzip(config.gzip)))
    .pipe(gulp.dest(jsDistDir))
    .pipe(browserSync.stream());
}

/**
 *
 */
function sharpResize(cb) {

  const options = config.sharp;

  const widths = config.imgOpt.widths;
  const transforms = config.imgOpt.transforms;

  const files = glob.sync(imgSrcDir + '**/*.+(jpeg|jpg|png|tiff|webp)');

  if (!fs.existsSync(imgDistDir)) {
    fs.mkdirSync(imgDistDir, { recursive: true });
  }

  files.forEach(file => {
    let ext = path.extname(file);
    let filename = path.basename(file, ext);
    let image = sharp(file);

    //
    widths.forEach(width => {

      image
        .metadata()
        .then(metadata => {

          let height = Math.round((width * metadata.height) / metadata.width);
          let resize = `${imgDistDir}${filename}_${width}w` + ext;

          if (false != glob.sync(resize)) return;

          image
            .resize(width, null, options)
            .toFile(resize)
            .catch(err => {
              console.log(err);
            });
        });
    });

    //
    transforms.forEach(size => {

      let resize = `${imgDistDir}${filename}_${size.width}x${size.height}` + ext;

      if (false != glob.sync(resize)) return;

      image
        .resize(size.width, size.height, options)
        .toFile(resize)
        .catch(err => {
          console.log(err);
        })
    });

  });

  cb();
}

// ############################## Exports ##############################

// core
exports.copy = copy;
exports.js = compileJs;
exports.sass = compileSass;
exports.sharp = sharpResize;

// composites
exports.build = gulp.parallel(exports.copy, exports.js, exports.sass, exports.sharp);
exports.default = gulp.series(exports.build, watch);

/**
 * use this for simple testing
 */
exports.test = function (cb) {
  let test;

  console.log(test);
  cb();
}
