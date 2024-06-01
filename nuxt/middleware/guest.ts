import {useAuthStore} from "~/stores/auth";
import {storeToRefs} from "pinia";
import {setAuthorization} from "~/composables/useApollo";

export default defineNuxtRouteMiddleware(async () => {
    console.log("guest middleware loaded");

    const authStore = useAuthStore();
    const userStore = useUserStore()
    const {token} = storeToRefs(authStore)

    if(token.value?.valueOf() !== undefined) {
        return navigateTo("/dashboard", { replace: true });
    }
});
