/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue'
  ],
  theme: {
    extend: {
        colors: {
            brand: "#091e45"
        }
    },
  },
  plugins: [],
}

