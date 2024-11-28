/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './resources/css/**/*.css', // Ensure CSS files are included

  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

