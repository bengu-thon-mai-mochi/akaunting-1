const defaultTheme = require('tailwindcss/defaultTheme')

const fontFamily = defaultTheme.fontFamily;
fontFamily['sans'] = [
  '"Quicksand"',// <-- Quicksand is a default sans font now
  'system-ui',
  // <-- Can provide more font fallbacks here
];

module.exports = {
  purge: { content: [
    '/resources/assets/js/*.vue',
    '/resources/assets/js/components/*.vue',
    '/resources/assets/js/views/**/*.vue',
    '/resources/views/js/*.vue',
    '/resources/views/partials/admin/*.blade.php',
    '/resources/views/**/**/*.blade.php',
  ]},
  darkMode: 'class', // or 'media' or 'class',
  theme: {
    fontFamily: fontFamily,
    extend: {
      fontSize: {
        '2xl': ['1.375rem'], // 22PX
        '3xl': ['1.5rem'], // 24PX
        '4xl': ['1.75rem'], // 28PX
        '5xl': ['2.25rem'], // 36PX
        '6xl': ['2.5rem'], // 40PX
        '7xl': ['2.75rem'], // 44PX
      },
        colors: {
          'primary': {
            DEFAULT: '#6EA152',
            'dark': '#4A6D37',
            'light': '#8FBB77',
            'subtle': '#C7DDBB',
          },
          'secondary': {
            DEFAULT: '#55588B',
            'dark': '#3E4065',
            'light': '#676AA2',
            'subtle': '#A6A8C9',
          },
          'error': {
            DEFAULT: '#CC0000',
            'dark': '#B80000',
            'light': '#E00000',
            'subtle': '#FF7070',
          },
          'warning':  {
            DEFAULT: '#FABC2A',
            'dark': '#EFA906',
            'light': '#FBCC60',
            'subtle': '#FCDF9C',
          },
          'info': {
            DEFAULT: '#006EA6',
            'dark': '#005F8F',
            'light': '#0096E0',
            'subtle': '#85D6FF',
          },
          'success': {
            DEFAULT: '#6EA152',
            'dark': '#4A6D37',
            'light': '#8FBB77',
            'subtle': '#C7DDBB',
          },
          'text': {
            DEFAULT: '#595959',
            'dark': '#424242',
            'light': '#6E6E6E',
            'subtle': '#7D7D7D',
          },
          'menu': {
            DEFAULT: '#F8F9FE',
            'light': '#EDF0FC',
          },
        },
    },
    appearance: ['hover', 'focus'],
  },
  plugins: []
}
