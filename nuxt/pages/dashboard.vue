<script setup lang="ts">
import {useQuery} from "@vue/apollo-composable";
import gql from "graphql-tag";
import {storeToRefs} from "pinia";

definePageMeta({ middleware: ["auth"] });

const userStore = useUserStore();
// await userStore.oo
const {user} = storeToRefs(userStore);



// await userStore.o
// console.log(user);

// const { result } = useQuery(gql`query Foo {foo}`)
// watchEffect(() => {
//   console.log(result.value)
// })
</script>

<template>
  <NuxtLayout name="app-layout">
    <Head>
      <Title>Laravel - Dashboard</Title>
    </Head>

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
      <h2><NuxtLink to="/foo">D2</NuxtLink></h2>
    </template>

    <div class="my-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            {{user?.name}}
            <br>
            You're logged in!
          </div>
        </div>
      </div>
    </div>
  </NuxtLayout>
</template>
