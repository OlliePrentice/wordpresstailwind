const plugin = require('tailwindcss/plugin');

module.exports = {
  purge: {
    content: [
      './*.php',
      './template-parts/**/*.php',
      './classes/**/*.php',
      './inc/**/*.php',
      './assets/**/*.scss',
      './assets/**/*.js',
    ],
  },
  darkMode: false,
  theme: {
    extend: {
      colors: {
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
      display: ['important'],
      inset: ['important'],
      width: ['important'],
      margin: ['last'],
      borderColor: ['important'],
      textColor: ['important']
    },
  },
  plugins: [
    plugin(function({ addVariant }) {
      addVariant('important', ({ container }) => {
        container.walkRules(rule => {
          rule.selector = `.\\!${rule.selector.slice(1)}`;
          rule.walkDecls(decl => {
            decl.important = true;
          });
        });
      });
    })
  ],
};
