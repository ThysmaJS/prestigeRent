// tailwind.config.js

module.exports = {
  content: [
    'templates/**/*.html.twig',
    'assets/js/**/*.js',
    'assets/js/**/*.jsx', // Si vous utilisez des fichiers React JSX
  ],
  theme: {
    extend: {
      colors: {
        customBlue: '#2F48C9',
        customBeige: '#FFF8EF',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
};
