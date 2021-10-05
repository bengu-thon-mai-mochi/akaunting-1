module.exports = {
  postcssOptions: {
    plugins: {
      tailwindcss: { config: './tailwind.config.js' },
      'postcss-smart-import': require('postcss-smart-import'),
      autoprefixer: require('autoprefixer')
    }
  },
};