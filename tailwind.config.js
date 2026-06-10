/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './includes/**/*.php',
    './components/**/*.php',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#1A2B44',
          dark: '#0F1A2E',
          light: '#243B5C',
        },
        accent: {
          DEFAULT: '#F59E0B',
          dark: '#D97706',
          light: '#FBBF24',
        },
        cream: {
          DEFAULT: '#F8F6F2',
          dark: '#EDE9E3',
          light: '#FDFCFA',
        },
        navy: {
          DEFAULT: '#1A2B44',
          900: '#0F1A2E',
          800: '#152238',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        display: ['Manrope', 'system-ui', 'sans-serif'],
        heading: ['Poppins', 'system-ui', 'sans-serif'],
      },
      borderRadius: {
        mvp: '4px',
      },
      letterSpacing: {
        brand: '0.25em',
        wide: '0.15em',
      },
    },
  },
  plugins: [],
};
