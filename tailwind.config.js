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
              'text': '#d3e0f8',
              'background': '#0d0f12',
              'primary': '#83a8ec',
              'secondary': '#184fb4',
              'accent': '#b0c4e8',
              'background-light': '#121518',
            },               
        },
    },

    plugins: [forms],
};
