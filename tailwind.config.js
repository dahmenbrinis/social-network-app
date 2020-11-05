module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {}
  },
    variants: {
        animation: ['responsive', 'hover', 'focus'],
    },
  plugins: [
    require('@tailwindcss/ui'),
  ]
};
