import { useQuery, useMutation} from '@vue/apollo-composable'
import gql from 'graphql-tag'
import type {LoginCredentials} from "~/stores/auth";

// export type User = {
//   name: string;
//   email?: string;
// };
//
// export type LoginCredentials = {
//   email: string;
//   password: string;
// };

// export type RegisterCredentials = {
//   name: string;
//   email: string;
//   password: string;
//   password_confirmation: string;
// };
//
// export type ResetPasswordCredentials = {
//   email: string;
//   password: string;
//   password_confirmation: string;
//   token: string;
// };

// Value is initialized in: ~/plugins/auth.ts
export const useUser = () => {
  return useState<User | undefined | null>("user", () => undefined);
};

export const useAuth = () => {
  const router = useRouter();

  const user = useUser();
  const isLoggedIn = computed(() => !!user.value);

  async function refresh() {
    try {
      // user.value = await fetchCurrentUser();
      user.value = <User>{email: "mail@test.com"};
    } catch {
      user.value = null;
    }
  }

  async function login(credentials: LoginCredentials) {
    if (isLoggedIn.value) return;

    const foo = await $larafetch("/api/user", { method: "post", body: credentials });
    await refresh();
  }

  // async function register(credentials: RegisterCredentials) {
  //   await $larafetch("/register", { method: "post", body: credentials });
  //   await refresh();
  // }

  // async function resendEmailVerification() {
  //   return await $larafetch<{ status: string }>(
  //     "/email/verification-notification",
  //     {
  //       method: "post",
  //     }
  //   );
  // }

  function logout() {
      const authStore = useAuthStore()
      const userStore = useUserStore();

      authStore.$reset()
      userStore.$reset()
      return navigateTo("/", {replace: true});

    // if (!isLoggedIn.value) return;
    //
    // await $larafetch("/logout", { method: "post" });
    // user.value = null;
    //
    // await router.push("/");
  }

  // async function forgotPassword(email: string) {
  //   return await $larafetch<{ status: string }>("/forgot-password", {
  //     method: "post",
  //     body: { email },
  //   });
  // }
  //
  // async function resetPassword(credentials: ResetPasswordCredentials) {
  //   return await $larafetch<{ status: string }>("/reset-password", {
  //     method: "post",
  //     body: credentials,
  //   });
  // }

  return {
    user,
    isLoggedIn,
    login,
    // register,
    // resendEmailVerification,
    logout,
    // forgotPassword,
    // resetPassword,
    refresh,
  };
};

export const fetchCurrentUser = async () => {
    return null;
  // try {
  //   return await $larafetch<User>("/api/user", {
  //     redirectIfNotAuthenticated: false,
  //   });
  // } catch (error: any) {
  //   if ([401, 419].includes(error?.response?.status)) return null;
  //   throw error;
  // }
};
