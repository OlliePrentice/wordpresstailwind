const plugin = require('tailwindcss/plugin');

module.exports = {
  purge: {
    content: [
      './*.php',
      './template-parts/**/*.php',
      './woocommerce/**/*.php',
      './classes/**/*.php',
      './inc/**/*.php',
      './assets/**/*.css',
      './assets/**/*.js',
    ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        gray: {
          200: '#f4eeee',
          600: '#5a5b5b',
          800: '#161619',
          900: '#020202'
        },
        'primary': 'var(--color-primary)',
        'secondary': 'var(--color-secondary)',
        'off-white': 'var(--color-off-white)',
        'facebook': 'var(--color-facebook)',
        'twitter': 'var(--color-twitter)'
      },
      fontSize: {
        'zero': '0',
        'xxs': '.625rem',
      },
      fontFamily: {
        'display': ['Poppins', 'ui-serif', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
        'body': ['Poppins', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"',],
      },
      container: {
        padding: {
          DEFAULT: '1rem',
        }
      },
    },
  },
  variants: {
    extend: {
      inset: ['important'],
      width: ['important'],
      margin: ['last'],
      textColor: ['important'],
      borderColor: ['important']
    },
  },
  plugins: [
    plugin(function({ addVariant }) {
      addVariant('important', ({ container }) => {
        container.walkRules(rule => {
          rule.selector = `.\\!${rule.selector.slice(1)}`;
          rule.walkDecls(decl => {
            decl.important = true
          })
        })
      })
    })
  ],
}
