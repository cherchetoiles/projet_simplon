/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./view/*.{html,js,php}"],
  theme: {
    extend: {
      colors : {
        'red':'#f01e29',
        'stroke':'#D9D9D9',
        'blue':'#016484',
        'gray-bg':'#EAEAEA',
        'gray-dark':'#858585',
        'gray':'#B7B7B7',

      },
      borderRadius: {
        '4xl':'40px',
     },
      fontFamily:{
        'body':'"Poppins", sans-serif',
        'sans':'"Montserrat", sans-serif',
      },
      plugins: [],
    }
  }
}