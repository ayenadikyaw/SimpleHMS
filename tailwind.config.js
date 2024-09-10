/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.css",
    ],
    theme: {
        extend: {
            colors: {
                primary: '#cd8d96',
                secondary: '#fccad1',
                success: '#28a745',
                danger: '#dc2626',
                warning: '#ffc107',
                info: '#17a2b8',
                light: '#f8f9fa',
                dark: '#362528',
            },
            fontFamily: {
                sans: ['Merriweather Sans', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
