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
                'content': '200px minmax(auto, 1fr) 200px'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
