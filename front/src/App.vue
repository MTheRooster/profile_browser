<script setup lang="ts">
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { onMounted, ref } from "vue";
import data from "./data/profiles";

interface Profile {
  id: number;
  firstname: string;
  lastname: string;
  biography: string;
}
const profiles = ref<Profile[]>([]);
profiles.value = data;
const selectedProfile = ref(4);

function isWindowSizeMedium() {
  return window.innerWidth > 768;
}

function handleSelection(index:number){
  selectedProfile.value = index
}

onMounted(() => {
  const script = document.createElement("script");
  console.log("couocu");
  script.src = "https://buttons.github.io/buttons.js";
  script.async = true;

  document.body.appendChild(script);
});
</script>

<template>
  <div class="w-screen bg-white text-black">
    <header class="py-5">
      <h1 class="mb-6 text-center text-5xl font-bold">Profile Browser</h1>
    </header>
    <div class="container mx-auto max-w-6xl justify-center md:px-8">
      <div class="grid grid-cols-1 gap-x-16 md:grid-cols-2">
        <div
          class="row-start-1 h-9 md:col-start-1 md:border-r md:border-r-sky-500"
        ></div>

        <div
          v-for="(profile, index) in profiles"
          :key="profile.id"
          class="h-10 pl-3 align-middle text-2xl font-bold md:col-start-1"
          :class="
            (['row-start-2','row-start-3','row-start-4','row-start-5','row-start-6','row-start-7','row-start-8','row-start-9','row-start-10','row-start-11','row-start-12','row-start-13','row-start-14','row-start-15'][index > selectedProfile ? index+1: index]) +
            (index == 0 ? ' md:rounded-tl-lg' : '') +
            (index === profiles.length - 1 ? ' md:rounded-bl-lg' : '')+
            ([' md:row-start-2',' md:row-start-3',' md:row-start-4',' md:row-start-5',' md:row-start-6',' md:row-start-7',' md:row-start-8',' md:row-start-9',' md:row-start-10',' md:row-start-11',' md:row-start-12',' md:row-start-13',' md:row-start-14',' md:row-start-15'][index+1]) +
            (index !== selectedProfile ? ' cursor-pointer  bg-gradient-to-b from-slate-300 to-slate-400 border border-sky-500 hover:from-green-400 hover:to-blue-500' : ' bg-white border-l border-y border-sky-500')
          "
          @click="handleSelection(index)"
        >
          {{ profile.firstname }} {{ profile.lastname }}
        </div>
        <div
          class="px-4 md:col-start-2 md:row-start-2 md:row-span-15 md:px-0"
          :class="['row-start-3','row-start-4','row-start-5','row-start-6','row-start-7','row-start-8','row-start-9','row-start-10','row-start-11','row-start-12','row-start-13','row-start-14','row-start-15'][selectedProfile]"
        >
          <h1 v-if="isWindowSizeMedium()">
            {{ profiles[selectedProfile].firstname }}
            {{ profiles[selectedProfile].lastname }}
          </h1>
          <img src="./assets/Angelina_Jolie.jpg" class="border-8 float-left w-40 me-4 drop-shadow-lg border-white rounded-md"/>
          <div>
            {{ profiles[selectedProfile].biography }}
          </div>
        </div>
        <div class="h-40 md:col-start-1 row-start-15 md:border-r md:border-r-sky-500"></div>
      </div>
    </div>
  </div>
</template>
