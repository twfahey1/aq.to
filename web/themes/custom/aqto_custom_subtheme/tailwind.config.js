module.exports = {
    content: [
      './templates/**/*.html.twig',
      './src/**/*.{js,ts,jsx,tsx,vue}',
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
    ],
  }
  