/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        'mono': ['Ubuntu Mono', 'monospace'],
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
