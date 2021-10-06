module.exports = {
  postcssOptions: {
    plugins: {
      tailwindcss: { config: './tailwind.config.js' },
      'postcss-import': require('postcss-import'),
      autoprefixer: require('autoprefixer'),
      'postcss-preset-env': require('postcss-preset-env')
    },
  },
};