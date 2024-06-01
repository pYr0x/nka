import {useAuthStore} from "~/stores/auth";
import {storeToRefs} from "pinia";
import {useAuth} from "~/composables/useAuth";
import {setAuthorization} from "~/composables/useApollo";

export default defineNuxtRouteMiddleware(async (to, from) => {

    console.log("auth middleware loaded");

    const authStore = useAuthStore();
    const {token} = storeToRefs(authStore)
    const userStore = useUserStore();
    const {user} = storeToRefs(userStore)
    const {logout} = useAuth()

    if(from.path === "/"){
        if(token.value?.valueOf() !== undefined && user.value?.valueOf() === undefined){
            setAuthorization(token)
            try {
                await userStore.fetch()
            } catch (e) {
            }
        }
    }

    if(token.value?.valueOf() === undefined || user.value?.valueOf() === undefined){
        console.log("auto logout");
        return logout();
    }
});
