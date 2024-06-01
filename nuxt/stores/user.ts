import {useAuthStore} from "~/stores/auth";
import {useQuery} from "@vue/apollo-composable";
import gql from "graphql-tag";
import {storeToRefs} from "pinia";
import {PriorityName} from "smob";
// import { logErrorMessages } from '@vue/apollo-util'

export interface User {
    id?: number,
    name: string,
    email: string
}

export const useUserStore = defineStore('user', () => {
    const user = ref<null | User>(null);
    const authStore = useAuthStore();
    const {token} = storeToRefs(authStore)

    // ACTIONS
    async function fetch() {
        if(token.value?.valueOf() === undefined){
            return Promise.reject();
        }
        return new Promise((resolve, reject) => {
            const {result,loading, error, onResult, onError} = useQuery(gql`query User {user {id, name, email}}`)

            onError((error) => {
                reject(error.message)
                console.log(error)
            })

            onResult((resultt) => {
                if(resultt.data && resultt.data.user){
                    user.value = resultt.data.user
                    resolve(user)
                }
                console.log(result)
            });


            // watch(loading, (n, o) => {
            //     console.log(error);
            //     user.value = result.value.user
            //     resolve(result.value.user)
            // });
        });
    }

    function $reset() {
        user.value = null
    }


    // onMounted(async () => {
    //     await fetch()
    // })
  return {fetch,user,$reset}
});

// export const useUserStore = defineStore('user', {
//     state: () => ({
//         // user: null as User | null,
//     }),
//     getters: {
//         async user(state) {
//           const {result,loading} = useQuery(gql`query User {user {id, name, email}}`)
//             watch(loading, async (n, o) => {
//                 Promise.resolve(result)
//             });
//         }
//
//     // const p = await new Promise((resolve, reject) => {
//     //     setTimeout(() => {
//     //
//     //         resolve('Changed Value!')
//     //     }, 20000);
// //     })
// //
// //     return p
// // }
//     },
//     actions: {
//     }
// });


// export const useUserStore = defineStore('user', () => {
//     // const user = ref();
//   const {result: user, loading} = useQuery(gql`query User {user {id, name, email}}`)
//
//     const oo = new Promise((resolve, reject) => {
//         watch(loading, async (n, o) => {
//             resolve()
//         });
//     });
//
//
//     // const o = new Promise((resolve, reject) => {
//     //   const {result, loading} = useQuery(gql`query User {user {id, name, email}}`)
//     //     watch(loading, async (n, o) => {
//     //         resolve(result)
//     //     });
//     // });
//
//     // o.then((result) => {
//     //     user.value = result;
//     // })
//
//     // const user = computed(async () => {
//     //     await o;
//     // });
//
//   // const {result: user, loading} = useQuery(gql`query User {user {id, name, email}}`)
//
//
//     // const {result, loading} = useQuery(gql`query User {user {id, name, email}}`)
//
//     const an = ref();
//
//     const p = new Promise((resolve, reject) => {
//         setTimeout(() => {
//             resolve('Changed Value!')
//         }, 20000)
//     })
//
//     p.then((value) => {
//         an.value = value;
//     })
//
//     // const pp = ref(p);
//
//     // watch(loading, async (newQuestion, oldQuestion) => {
//     //     console.log(result.value.user);
//     //     debugger;
//     // });
//
//     // const user = computed(() => "lala");
//
//
//     // const user = computed(() => result.value?.user || []);
//     const foo = ref("bar");
//     return {
//         user,
//         p,
//         foo,
//         an,
//         oo,
//     }
// })
