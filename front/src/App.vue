<script setup lang="ts">
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { ref } from "vue";
import data from "./data/profiles";
import HeaderCard from "./components/HeaderCard.vue"
import NavigationCard from "./components/NavigationCard.vue";
import Profile from "./types/Profile"

const profiles = ref<Profile[]>([]);
profiles.value = data;

</script>

<template>
  <div class="w-screen bg-white text-black">
    <header-card />
    <div class="container mx-auto max-w-6xl justify-center md:px-8">
      <navigation-card :profiles="profiles" />
    </div>
  </div>
</template>
