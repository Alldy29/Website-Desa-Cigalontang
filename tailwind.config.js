import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        {
            pattern: /(bg|text|border)-(primary|secondary|accent|gray-500|gray-600)/,
            variants: ['hover', 'group-hover'],
        },
        {
            pattern: /bg-(primary|secondary|accent|gray-500|gray-600)\/(20|90)/,
        }
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#15803d',
                    light: '#16a34a',
                    dark: '#166534',
                },
                secondary: {
                    DEFAULT: '#0ea5e9',
                },
                accent: {
                    DEFAULT: '#eab308',
                }
            }
        },
    },

    plugins: [forms],
};
