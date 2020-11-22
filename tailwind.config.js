module.exports = {
  theme: {
    screens: {
      sm: '576px',
      md: '768px',
      lg: '992px',
      xl: '1200px',
      xx: '1540px'
    },
    extend: {
      fontFamily: {
        body: ['Fira Sans', 'Open Sans', 'Helvetica Neue', "Helvetica", "Arial"],
        display: ['Fira Sans Condensed', 'Georgia', "Times New Roman", 'Times']
      },
      colors: {
        gray: {
          bg: '#EFF0F2',
          lighter: '#F1F2F2',
          light: '#D4D7DD',
          med: '#58585B',
          dark: '#333333',
          '100': '#f7fafc',
          '200': '#edf2f7',
          '300': '#e2e8f0',
          '400': '#cbd5e0',
          '500': '#a0aec0',
          '600': '#718096',
          '700': '#4a5568',
          '800': '#2d3748',
          '900': '#1a202c'
        },
        black: '#070808',
        yellow: '#FEC325',
        red: '#ED1B2E',
        green: '#00B156',
        blue: '#00A0D8',
        lightBlue: "#186EFF"
      },
      boxShadow: {
        customNorm: '0 4px 6px 0 rgba(50, 50, 93, 0.11), 0 1px 3px 0 rgba(0, 1, 3, 0.08)',
        customLg: '0 0 20px 0 rgba(0,0,0,0.1)'
      }
    }
  },
  options: {
    prefix: '',
    important: false,
    separator: ':'
  },
  variants: {},
  plugins: []
}