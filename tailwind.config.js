import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        // "./node_modules/flowbite/**/*.js"
    ],  

    darkMode: 'media',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'background-light': '#121518',
                'text': {
                    DEFAULT: '#d3e0f8',
                    50: '#e9effc',
                    100: '#d3e0f8',
                    200: '#a7c1f1',
                    300: '#7ba2ea',
                    400: '#4f83e3',
                    500: '#2264dd',
                    600: '#1c50b0',
                    700: '#153c84',
                    800: '#0e2858',
                    900: '#07142c',
                    950: '#030a16',
                },
                'background': {
                    DEFAULT: '#0d0f12',
                    50: '#f0f2f4',
                    100: '#e1e5ea',
                    200: '#c4cad4',
                    300: '#a6b0bf',
                    400: '#8996a9',
                    500: '#6b7b94',
                    600: '#566376',
                    700: '#404a59',
                    800: '#2b313b',
                    900: '#15191e',
                    950: '#0b0c0f',
                },
                'primary': {
                    DEFAULT: '#83a8ec',
                    50: '#e9effc',
                    100: '#d3e0f8',
                    200: '#a7c1f1',
                    300: '#7ba2ea',
                    400: '#4f83e3',
                    500: '#2264dd',
                    600: '#1c50b0',
                    700: '#153c84',
                    800: '#0e2858',
                    900: '#07142c',
                    950: '#030a16',
                },
                'secondary': {
                    DEFAULT: '#184fb4',
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
                    DEFAULT: '#b0c4e8',
                    50: '#ebf0f9',
                    100: '#d7e1f4',
                    200: '#b0c4e8',
                    300: '#88a6dd',
                    400: '#6188d1',
                    500: '#396ac6',
                    600: '#2e559e',
                    700: '#224077',
                    800: '#172b4f',
                    900: '#0b1528',
                    950: '#060b14',
                },
            },               
        },
    },

    plugins: [
        // require('flowbite/plugin'),
        forms,
    ],

    
    
};
