import plugin from 'tailwindcss/plugin';

const typography = plugin(({ addComponents }) => {
    addComponents({
        '.prose': {
            '--tw-prose-body': 'var(--color-brand-700)',
            '--tw-prose-headings': 'var(--color-brand-900)',
            maxWidth: '65ch',
        },
    });
});

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    50: '#ffffff',
                    100: '#f8f8f8',
                    200: '#ededed',
                    300: '#dcdcdc',
                    400: '#b8b8b8',
                    500: '#8c8c8c',
                    600: '#5c5c5c',
                    700: '#3f3f3f',
                    800: '#1f1f1f',
                    900: '#000000',
                },
            },
        },
    },
    plugins: [typography],
};
