import { defineNuxtConfig } from "nuxt/config";

// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
    ssr: false,
    spaLoadingTemplate: false,
    // css: ['vuetify/lib/styles/main.sass'],
    css: ["@/assets/main.scss"],
  modules: [
      // "@nuxtjs/tailwindcss",
      '@pinia/nuxt',
      '@pinia-plugin-persistedstate/nuxt',
      "@vueuse/nuxt",
      // '@nuxtjs/axios',
      // '@nuxtjs/auth-next'
  ], //, "@nuxtjs/apollo"],
    build: { transpile: ["vuetify"] },
  runtimeConfig: {
    public: {
      backendUrl: "http://localhost:8000",
      frontendUrl: "http://localhost:3000",
    },
  },
  imports: {
    dirs: [
        "./utils",
        './stores'
    ],
  },
    pinia: {
        autoImports: ['defineStore', 'acceptHMRUpdate'],
    },
    // apollo: {
    //     autoImports: true,
    //     clients: {
    //         default: {
    //             httpLinkOptions: {
    //                 credentials: 'include'
    //             },
    //             httpEndpoint: 'http://localhost:8000/graphql'
    //         }
    //     },
    // },
});
