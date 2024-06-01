// import { useUser, fetchCurrentUser } from "~/composables/useAuth";
//
import {useAuthStore} from "~/stores/auth";
import {storeToRefs} from "pinia";
import {setAuthorization} from "~/composables/useApollo";

export default defineNuxtPlugin(async() => {

    console.log("auth plugin loaded");
    useApollo()

    const route = useRoute()

    if(route.path !== "/"){

        const authStore = useAuthStore();
        const {token} = storeToRefs(authStore)
        setAuthorization(token)

        const userStore = useUserStore();

        try {
            await userStore.fetch()
        } catch (e) {
        }


    }
});
