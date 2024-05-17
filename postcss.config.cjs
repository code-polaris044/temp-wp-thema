/** @type {import('postcss-load-config').Config} */

// postcss.config.cjs
const postcssImport = require('postcss-import');
const postcssNormalize = require('postcss-normalize-charset');
const postcssSortMediaQueries = require('postcss-sort-media-queries');
const postcssReporter = require('postcss-reporter');

module.exports = {
    plugins: {
        'postcss-import': postcssImport(),
        'postcss-normalize-charset': postcssNormalize(),
        'postcss-sort-media-queries': postcssSortMediaQueries(),
        'postcss-reporter': postcssReporter({ clearMessages: true }),
        autoprefixer: {},
        'css-declaration-sorter': {
            order: 'smacss',
        },
    },
};
