<script setup lang="ts">
import {storeToRefs} from "pinia";
import type {LoginCredentials} from "~/stores/auth";

definePageMeta({ middleware: ["guest"] });

const router = useRouter();
const route = useRoute();


const authStore = useAuthStore();

const rules = {
    required: value => !!value || 'Bitte angeben',
}

const data = reactive<LoginCredentials>({
  email: "",
  password: "",
});

const {
  submit,
  inProgress,
  validationErrors: errors,
} = useSubmit(
  async () => {
          const token = await authStore.login(data);
          setAuthorization(token)
  },
  {
    onSuccess: (data) => router.push("/dashboard"),
    onError: () => {
      data.password = "";
    }
  }
);


</script>

<template>
    <v-sheet class="d-flex align-center justify-center" height="100vh">
    <v-card title="NKA Login" width="500px" :loading="inProgress">
        <v-card-subtitle>
            <span :style="{color: 'rgb(176, 0, 32)'}">{{errors.email?.[0]}}</span>
        </v-card-subtitle>
       <v-card-text>
           <v-form @submit.prevent="submit" id="login" v-model="foo">
               <v-text-field
                   v-model="data.email"
                   label="Benutzername"
                   :error-messages="errors.email?.[0]"
               ></v-text-field>
               <v-text-field
                   v-model="data.password"
                   label="Password"
                   :error-messages="errors.password"
               ></v-text-field>
           </v-form>

       </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
            <v-btn type="submit" block class="mt-2" form="login" prepend-icon="mdi-login-variant" :disabled="inProgress">Login</v-btn>
        </v-card-actions>
    </v-card>
    </v-sheet>
<!--  <AuthCard>-->
<!--    <template #logo>-->
<!--      <NuxtLink to="/">-->
<!--        <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />-->
<!--      </NuxtLink>-->
<!--    </template>-->

<!--    &lt;!&ndash; Session Status &ndash;&gt;-->
<!--&lt;!&ndash;    <AuthSessionStatus class="mb-4" :status="status" />&ndash;&gt;-->
<!--    <form @submit.prevent="submit">-->
<!--      &lt;!&ndash; Email Address &ndash;&gt;-->
<!--      <div>-->
<!--        <Label for="email">E-Mail</Label>-->
<!--        <Input-->
<!--          id="email"-->
<!--          type="email"-->
<!--          class="block mt-1 w-full"-->
<!--          v-model="data.email"-->
<!--          :errors="errors.email?.[0]"-->
<!--          autoFocus-->
<!--        />-->
<!--      </div>-->

<!--      &lt;!&ndash; Password &ndash;&gt;-->
<!--      <div class="mt-4">-->
<!--        <Label for="password">Password</Label>-->
<!--        <Input-->
<!--          id="password"-->
<!--          type="password"-->
<!--          class="block mt-1 w-full"-->
<!--          v-model="data.password"-->
<!--          :errors="errors.password"-->
<!--          autoComplete="current-password"-->
<!--        />-->
<!--      </div>-->

<!--&lt;!&ndash;      &lt;!&ndash; Remember Me &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;      <div class="block mt-4">&ndash;&gt;-->
<!--&lt;!&ndash;        <label for="remember" class="inline-flex items-center">&ndash;&gt;-->
<!--&lt;!&ndash;          <input&ndash;&gt;-->
<!--&lt;!&ndash;            id="remember"&ndash;&gt;-->
<!--&lt;!&ndash;            type="checkbox"&ndash;&gt;-->
<!--&lt;!&ndash;            name="remember"&ndash;&gt;-->
<!--&lt;!&ndash;            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"&ndash;&gt;-->
<!--&lt;!&ndash;            v-model="data.remember"&ndash;&gt;-->
<!--&lt;!&ndash;          />&ndash;&gt;-->
<!--&lt;!&ndash;          <span class="ml-2 text-sm text-gray-600"> Remember me </span>&ndash;&gt;-->
<!--&lt;!&ndash;        </label>&ndash;&gt;-->
<!--&lt;!&ndash;      </div>&ndash;&gt;-->

<!--      <div class="flex items-center justify-end mt-4">-->
<!--&lt;!&ndash;        <NuxtLink&ndash;&gt;-->
<!--&lt;!&ndash;          href="/forgot-password"&ndash;&gt;-->
<!--&lt;!&ndash;          class="underline text-sm text-gray-600 hover:text-gray-900"&ndash;&gt;-->
<!--&lt;!&ndash;        >&ndash;&gt;-->
<!--&lt;!&ndash;          Forgot your password?&ndash;&gt;-->
<!--&lt;!&ndash;        </NuxtLink>&ndash;&gt;-->

<!--        <Button class="ml-3" :disabled="inProgress">Login</Button>-->
<!--      </div>-->
<!--    </form>-->
<!--  </AuthCard>-->
</template>
