<script setup lang="ts">
import LoginButton from "./LoginButton.vue";
import IconMenuButton from "./IconMenuButton.vue";
import { ref } from "vue";
import type { Ref } from "vue";

const isUserLogged: Ref<Boolean> = ref(true);

const MenuContent: Ref<String[]> = ref([
  "Ajouter un profil",
  "Éditer un profil",
  "Log out",
]);
</script>
<template>
  <header class="justify-items-strech grid grid-flow-col py-5">
    <div></div>
    <h1 class="mb-6 text-center text-5xl font-bold">Profile Browser</h1>
    <div class="justify-self-left">
      <LoginButton v-if="!isUserLogged" />
      <icon-menu-button
        icon-path="./src/assets/user.svg"
        :menu-content="MenuContent"
        v-else
      />
    </div>
  </header>
</template>
