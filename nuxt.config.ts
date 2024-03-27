// https://nuxt.com/docs/api/configuration/nuxt-config
export default {
    devtools: { enabled: true },
    css: ["~/assets/css/tailwind.css"],
    components: [
        { path: "~/components/icons/", prefix: "Icon" },
        "@/components",
    ],
    postcss: {
        plugins: {
            tailwindcss: {},
            autoprefixer: {},
        },
    },
    modules: ["@pinia/nuxt", "@pinia-plugin-persistedstate/nuxt", "nuxt-icon"],
};
