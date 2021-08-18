module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            gridTemplateColumns: {
                'content': '100px minmax(auto, 1fr) 100px'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
