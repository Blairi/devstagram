/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/**.blade.php"
    ],
    theme: {
        extend: {
            keyframes: {
                newCommentary: {
                    '0%': { background: '#0284c7' },
                    '100%': { background: '#ffffff' },
                }
            }
        },
    },
    plugins: [],
}
