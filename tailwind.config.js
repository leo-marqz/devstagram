/** @type {import('tailwindcss').Config} */
// "./resources/views/layouts/app.blade.php"
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
