<script setup lang="ts">
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import { onMounted } from "vue";

onMounted(() => {
  const script = document.createElement("script");

  script.src = "https://buttons.github.io/buttons.js";
  script.async = true;

  document.body.appendChild(script);
});
</script>

<template>
  <div class="h-screen bg-gray-800 text-white">
    <header class="py-16">
      <h1 class="mb-6 text-center text-5xl font-bold">Create Tailwind</h1>
      <p className="text-center mb-6 text-xl">
        If you like this project, consider giving it a star on GitHub!
      </p>

      <div class="flex flex-row items-center justify-center gap-4">
        <a
          class="github-button"
          href="https://github.com/andrejjurkin/create-tw"
          data-color-scheme="no-preference: dark; light: dark; dark: dark;"
          data-icon="octicon-star"
          data-size="large"
          data-show-count="true"
          aria-label="Star andrejjurkin/create-tw on GitHub"
        >
          Star
        </a>
        <a
          class="github-button"
          href="https://github.com/andrejjurkin/create-tw/discussions"
          data-color-scheme="no-preference: dark; light: dark; dark: dark;"
          data-icon="octicon-comment-discussion"
          data-size="large"
          aria-label="Discuss andrejjurkin/create-tw on GitHub"
        >
          Discuss
        </a>
      </div>
    </header>

    <div class="flex items-center justify-center gap-16">
      <a href="https://vitejs.dev" target="_blank">
        <img src="/vite.svg" class="h-24 w-24" alt="Vite logo" />
      </a>
      <a href="https://vuejs.org/" target="_blank">
        <img src="./assets/vue.svg" class="h-24 w-24" alt="Vue logo" />
      </a>
    </div>
  </div>
</template>
