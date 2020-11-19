const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        enabled: false,
        content: [
            path.resolve('resources/**/*.html'),
            path.resolve('resources/**/*.vue'),
            path.resolve('resources/**/*.jsx'),
            path.resolve('resources/**/*.php'),
            path.resolve('resources/index.php'),
        ],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        animation: ['responsive', 'hover', 'focus', 'group-hover'],
        width: ['responsive', 'hover', 'focus'],
    },

    plugins: [
        require('@tailwindcss/ui'),
        require('@fullhuman/postcss-purgecss')

    ],
};
