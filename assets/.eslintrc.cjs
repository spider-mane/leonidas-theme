module.exports = {
  root: true,
  parser: 'vue-eslint-parser',
  parserOptions: {
    parser: '@typescript-eslint/parser',
    sourceType: 'module',
    ecmaVersion: 'latest',
    ecmaFeatures: {},
  },
  extends: [
    'eslint:recommended',
    'plugin:@typescript-eslint/recommended',
    'plugin:@typescript-eslint/recommended-requiring-type-checking',
    'plugin:jsdoc/recommended',
    'plugin:vue/vue3-recommended',
  ],
  plugins: ['@typescript-eslint', 'jsdoc', 'vue'],
  globals: {
    Atomics: 'readonly',
    SharedArrayBuffer: 'readonly',
    document: true,
    window: true,
    wp: true,
  },
  env: {
    node: true,
    es6: true,
    browser: true,
    amd: true,
  },
  settings: {
    react: {
      version: 'detect',
    },
  },
  rules: {},
};
