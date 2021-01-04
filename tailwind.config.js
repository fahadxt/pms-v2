const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blue': {
                    '50': '#f6f8fa', 
                    '100': '#edf1f4', 
                    '200': '#d3dbe4', 
                    '300': '#b8c6d3', 
                    '400': '#829bb3', 
                    '500': '#4d7092', 
                    '600': '#456583', 
                    '700': '#3a546e', 
                    '800': '#2e4358', 
                    '900': '#263748'
                },
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
