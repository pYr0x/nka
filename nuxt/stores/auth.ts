import {FetchError} from "ofetch";
import {setAuthorization} from "~/composables/useApollo";

export interface LoginCredentials {
    email: string;
    password: string;
}

export const useAuthStore = defineStore('auth', {
    state: () => ({
        token: null as String | null,
    }),
    getters: {},
    actions: {
        async login(credentials: LoginCredentials) {
            const data = await $fetch(`http://localhost:8000/api/login`, {
                method: "post",
                body: credentials,
            });

            if (data.token && data.token.length > 0) {
                this.token = data.token
                return data.token
            }
            return null
        }
    },
    persist: {
        storage: persistedState.localStorage,
        afterRestore: (ctx) => {
            // setAuthorization(ctx.store.token)
            console.log(`just restored '${ctx.store.token}'`)
            console.log(`just restored '${ctx.store.$id}'`)
        },
        beforeRestore: (ctx) => {
            console.log(`about to restore '${ctx.store.$id}'`)
        }
    }
});
