// https://nuxt.com/docs/api/configuration/nuxt-config
export default {
    devtools: { enabled: true },
    css: ["~/assets/css/tailwind.css", 'primevue/resources/themes/aura-light-green/theme.css'],
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
    modules: [
        "@pinia/nuxt",
        "nuxt-vue3-google-signin",
        "@pinia-plugin-persistedstate/nuxt",
        "@vee-validate/nuxt",
        "nuxt-icon",
        "nuxt-primevue",
        '@nuxt/content',
    ],
    googleSignIn: {
        clientId:
            "23212824144-5dc3coq8tj4m92apo973le17gj5pt8mf.apps.googleusercontent.com",
    },
    runtimeConfig: {
        public: {
            baseURL: process.env.NUXT_BASE_URL,
            apiURL: process.env.NUXT_API_BASE_URL,
            referer: process.env.NUXT_REFERER_URL,
        },
    },
    piniaPersistedstate: {
        cookieOptions: {
            sameSite: "strict",
        },
    },
    build: {
        transpile: ["pinia-plugin-persistedstate"],
    },
    generate: { fallback: '404.html' }
    
};
