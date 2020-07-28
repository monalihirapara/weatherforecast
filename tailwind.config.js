const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    fontFamily: {
      sans: [
        'Nunito',
        ...defaultTheme.fontFamily.sans
      ]
    },

    extend: {
      fontSize: {
        '7xl': '7rem',
      },
    },
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'active']
  },
  plugins: [],
}
