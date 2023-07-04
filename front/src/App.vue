<script setup lang="ts">
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { ref, onMounted } from "vue";
import HeaderCard from "./components/HeaderCard.vue"
import NavigationCard from "./components/NavigationCard.vue";
import Profile from "./types/Profile"
import profileService from "./services/ProfileService"

const profiles = ref<Profile[]>([]);

onMounted(loadProfile)

async function loadProfile(){
  profiles.value = (await profileService.getProfiles()).data;
}

</script>

<template>
  <div class="w-screen bg-white text-black">
    <header-card @reload-profiles="loadProfile"/>
    <div class="container mx-auto max-w-6xl justify-center md:px-8">
      <navigation-card v-if="profiles.length>0" :profiles="profiles" />
    </div>
  </div>
</template>
