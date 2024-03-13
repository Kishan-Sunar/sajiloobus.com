/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./components/**/*.{js,vue,ts}",
        "./layouts/**/*.vue",
        "./pages/**/*.vue",
        "./plugins/**/*.{js,ts}",
        "./app.vue",
        "./error.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                montserrat: "Montserrat",
            },
        },
        container: {
            padding: {
                DEFAULT: "1rem",
            },
            screens: {
                "2xl": "1100px",
            },
        },
    },
    plugins: [],
};
