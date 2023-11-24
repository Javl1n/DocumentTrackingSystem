import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'text': {
                  50: '#ebf0fa',
                  100: '#d6e0f5',
                  200: '#adc2eb',
                  300: '#85a3e0',
                  400: '#5c85d6',
                  500: '#3366cc',
                  600: '#2952a3',
                  700: '#1f3d7a',
                  800: '#142952',
                  900: '#0a1429',
                  950: '#050a14',
                },
                'background': {
                  50: '#eceff9',
                  100: '#d9dff2',
                  200: '#b3bfe6',
                  300: '#8c9fd9',
                  400: '#667fcc',
                  500: '#4060bf',
                  600: '#334c99',
                  700: '#263973',
                  800: '#19264d',
                  900: '#0d1326',
                  950: '#060a13',
                },
                'primary': {
                  50: '#ebf0f9',
                  100: '#d8e1f3',
                  200: '#b0c4e8',
                  300: '#89a6dc',
                  400: '#6288d0',
                  500: '#3b6bc4',
                  600: '#2f559d',
                  700: '#234076',
                  800: '#172b4f',
                  900: '#0c1527',
                  950: '#060b14',
                },
                'secondary': {
                  50: '#e9effc',
                  100: '#d2e0f9',
                  200: '#a5c0f3',
                  300: '#78a1ed',
                  400: '#4b82e7',
                  500: '#1f62e0',
                  600: '#184fb4',
                  700: '#123b87',
                  800: '#0c275a',
                  900: '#06142d',
                  950: '#030a16',
                },
                'accent': {
                  50: '#ebf0f9',
                  100: '#d8e1f3',
                  200: '#b0c4e8',
                  300: '#89a6dc',
                  400: '#6288d0',
                  500: '#3b6bc4',
                  600: '#2f559d',
                  700: '#234076',
                  800: '#172b4f',
                  900: '#0c1527',
                  950: '#060b14',
                },
               },               
        },
    },

    plugins: [forms],
};
