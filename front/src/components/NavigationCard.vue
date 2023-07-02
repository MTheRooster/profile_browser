<script setup lang="ts">
import { ref } from "vue";
import Profile from "../types/Profile";
import rowStarts from "../utils/row-start-utils";
import mdRowStarts from "../utils/md-row-start-utils";

interface Props {
  profiles: Profile[];
}

const props = defineProps<Props>();

const selectedProfile = ref(0);

function isWindowSizeMedium() {
  return window.innerWidth > 768;
}

function handleSelection(index: number) {
  selectedProfile.value = index;
}
</script>
<template>
  <div class="grid grid-cols-1 gap-x-16 md:grid-cols-2">
    <div
      class="col-start-1 px-4 md:col-start-2 md:row-start-2 md:px-0"
      :class="`${rowStarts[selectedProfile + 2]} md:row-span-15`"
    >
      <h1 v-if="isWindowSizeMedium()">
        {{ profiles[selectedProfile].firstname }}
        {{ profiles[selectedProfile].lastname }}
      </h1>
      <img
        src="../assets/Angelina_Jolie.jpg"
        class="float-left me-4 w-40 rounded-md border-8 border-white drop-shadow-lg"
      />
      <div>
        {{ profiles[selectedProfile].biography }}
      </div>
    </div>
    <div
      class="row-start-1 h-9 md:col-start-1 md:row-start-1 md:border-r md:border-r-sky-500"
    ></div>

    <div
      v-for="(profile, index) in profiles"
      :key="profile.id"
      class="h-10 pl-3 align-middle text-2xl md:col-start-1"
      :class="
        `${
          index > selectedProfile ? rowStarts[index + 2] : rowStarts[index + 1]
        }` +
        (index == 0 ? ' md:rounded-tl-lg' : '') +
        (index === profiles.length - 1 ? ' md:rounded-bl-lg' : '') +
        ` ${mdRowStarts[index + 1]}` +
        (index !== selectedProfile
          ? ' cursor-pointer border border-sky-500 bg-gradient-to-b from-slate-300 to-slate-400 hover:from-green-400 hover:to-blue-500'
          : ' border-y border-l border-sky-500 bg-white font-bold')
      "
      @click="handleSelection(index)"
    >
      {{ profile.firstname }} {{ profile.lastname }}
    </div>
    <div
      class="h-40 md:col-start-1 md:border-r md:border-r-sky-500"
      :class="`md:row-start-${profiles.length + 2} ${
        rowStarts[profiles.length + 2]
      }`"
    ></div>
  </div>
</template>
