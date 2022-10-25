const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        screens: {
            'md': '640px',
            'ls': '768px',
            'xl': '1024px',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                light: '0 0 15px 0 rgba(255,255,255,.1)'
            }
        },
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'important']
    },

    plugins: [
        require('@tailwindcss/forms'),
        plugin(function ({addVariant}) {
            addVariant('important', ({container}) => {
                container.walkRules(rule => {
                    rule.selector = `.\\!${rule.selector.slice(1)}`
                    rule.walkDecls(decl => {
                        decl.important = true
                    })
                })
            })
        }),
    ],
};
