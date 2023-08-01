/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./view/*.{html,js,php}","./assets/script/*.js","./view/**/*.{html,js,php}","./controller/*.php"],
  theme: {
    extend: {
      keyframes:{ 
        in_and_out :{
          '0%': {transform: 'scale(1)'},
          '20%,40%':{transform: 'scale(1.5)'},
          '70%,100%':{transform: 'scale(0)'},
        },
        shake: {
          "0%": {transform: "translate(0px)"},
          "20%":{transform: "translate(5px)"},
          "40%":{transform: "translate(-5px)"},
          "60%":{transform: "translate(5px)"},
          "80%":{transform: "translate(-5px)"},
          "100%": {transform: "translate(0px)"}
        }
      },
      animation: {
        'in_and_out': 'in_and_out 1s forwards 1',
        'shake':"shake 500ms linear 1",
      },
      colors : {
        'red':'#f01e29',
        'stroke':'#D9D9D9',
        'blue':'#016484',
        'gray-bg':'#EAEAEA',
        'gray-dark':'#858585',
        'gray':'#B7B7B7',
        'hovered':"#B4131B"
      },
      borderRadius: {
        '4xl':'40px',
      },
      fontFamily:{
        'body':'"Poppins", sans-serif',
        'sans':'"Montserrat", sans-serif',
      },
      boxShadow: {
        'lg': '20px 25px 20px -20px rgba(0, 0, 0, 0.3)',
      }
    }
  },
  plugins: [], // This should be outside the "extend" property
};