<script setup lang="ts">

interface Props {
    modalTitle:string
}

const props = defineProps<Props>()
const emit = defineEmits<{closeModal: []}>()

</script>
<template>
    <div
      class="relative z-10"
      role="dialog"
      aria-modal="true"
    >
      <div
        class="fixed inset-0 bg-gray-950 bg-opacity-70 transition-opacity"
      ></div>
      <div class="fixed inset-x-0 top-40 z-10 overflow-y-auto">
        <div
          class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
        >
          <div class="relative bg-white rounded-lg px-4 pb-4 pt-5 md:p-6 md:pb-4">
            <div class="absolute right-2 top-1 text-black text-xl cursor-pointer hover:bg-red-400 p-1 rounded-md font-semibold hover:text-white" @click="emit('closeModal')">X</div>
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center md:ml-4 md:mt-0 md:text-left">
                <h3
                  class="text-base font-bold leading-6 text-gray-900"
                  id="modal-title"
                >
                {{ modalTitle }}
                </h3>
                <slot></slot>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>