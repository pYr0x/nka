import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi-svg'

import '@mdi/font/css/materialdesignicons.css'

export default defineNuxtPlugin(nuxtApp => {
    const vuetify = createVuetify({
        ssr: false,
        theme: {
            defaultTheme: 'light',
        },
        components,
        directives,
        icons: {
            // defaultSet: 'mdi',
            // aliases,
            // sets: {
            //     mdi,
            // },
        },
    })

    nuxtApp.vueApp.use(vuetify)
})
