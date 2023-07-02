<script setup lang="ts">
import { ref } from "vue";
import type { Ref } from "vue";
import ModalCard from "./ModalCard.vue";
import LoginForm from "./LoginForm.vue"

const showLoginModal: Ref<Boolean> = ref(false);
</script>

<template>
  <div>
    <div class="relative">
      <div
        class="relative cursor-pointer"
        @click="showLoginModal = !showLoginModal"
      >
        Login
      </div>
    </div>
    <modal-card v-if="showLoginModal" @close-modal="showLoginModal=false" modal-title="Log in">
      <login-form></login-form>
    </modal-card>
  </div>
</template>
