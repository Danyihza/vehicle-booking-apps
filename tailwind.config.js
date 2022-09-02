/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
  "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {},
    fontFamily: {
      sans: ['Inter', 'sans-serif']
    }
  },
  plugins: [require("@tailwindcss/typography"),require('flowbite/plugin'), require("daisyui")],
  daisyui: {
    themes: ['light'],
  },
}
