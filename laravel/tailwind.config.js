/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './resources/css/**/*.css', // Ensure CSS files are included

  ],
  theme: {
    extend: {
      "animation": {
        "fade-in-right": "fade-in-right 1.5s ease-out"
      },
      "fade-in-right": {
        "0%": {
          "opacity": "0",
          "transform": "translateX(0)"
        },
        "50%": {
          "opacity": "0.5",
          "transform": "translateX(10px)"
        },
        "100%": {
          "opacity": "1",
          "transform": "translateX(20px)"
        }
      }



    },
  },
  plugins: [],
}

