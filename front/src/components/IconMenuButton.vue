<script setup lang="ts">
import { ref } from "vue";
import type { Ref } from "vue";

document.addEventListener("click", handleOutsideClick);
interface Props {
  iconPath: string;
  menuContent: String[];
}
const showMenu: Ref<Boolean> = ref(false);

const props = defineProps<Props>();

function handleOutsideClick(event: Event) {
  if (
    event.target instanceof Element &&
    (event.target.id.includes("user-menu-item-") ||
      event.target.id.includes("menu-button"))
  )
    return;
  showMenu.value = false;
}
</script>

<template>
  <div class="relative">
    <div class="relative cursor-pointer" @click="showMenu = !showMenu">
      <img :src="iconPath" id="menu-button" />
    </div>
    <div
      v-if="showMenu"
      class="absolute -left-40 z-10 mt-3 w-48 origin-top-left rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      role="menu"
      aria-orientation="vertical"
      aria-labelledby="user-menu-button"
      tabindex="-1"
    >
      <div v-for="(content, index) in menuContent" :key="index">
        <a
          href="#"
          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-700 hover:text-white"
          role="menuitem"
          tabindex="-1"
          :id="`user-menu-item-${index}`"
          >{{ content }}</a
        >
      </div>
    </div>
  </div>
</template>
