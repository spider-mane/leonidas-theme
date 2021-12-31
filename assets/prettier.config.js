module.exports = {
  arrowParens: 'avoid',
  bracketSpacing: false,
  tabWidth: 2,
  printWidth: 80,
  singleQuote: true,
  jsxBracketSameLine: true,
  useTabs: false,
  trailingComma: 'all',
  semi: true,
  overrides: [
    {
      files: ['*.md'],
      options: {
        parser: 'markdown',
      },
    },
    {
      files: ['*.json'],
      options: {
        parser: 'json',
      },
    },
  ],
};
