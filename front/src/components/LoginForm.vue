<script setup lang="ts">
import { ref } from 'vue'
import { useUserStore } from "../stores/useUserStore"
import ProgressCircular from './ProgressCircular.vue';

const email = ref('')
const password = ref('')
const missingPassword = ref(false)
const missingEmail = ref(false)
const isLoading = ref(false)

const emit = defineEmits<{closeForm: []}>()

const {register} = useUserStore()

async function handleRegistration(){
  if(!password.value)
    missingPassword.value = true
  
  if(!email.value)
    missingEmail.value = true

  if(password.value && email.value) {
    isLoading.value = true
    await register({email: email.value, password: password.value}) 
    isLoading.value = false
    emit('closeForm')
  }
}

</script>
<template>
    <div>
        <div class="mt-3 sm:col-span-4">
      <label for="email" class="block text-sm font-medium leading-6 text-gray-900"> Enter your email</label>
       <div class="mt-2">
        <input v-model="email" id="email" name="email" type="email" autocomplete="email" class="pl-3 w-80 block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      </div>
        <p v-if="missingEmail" class="text-red-500">Please enter a valid email</p>
      </div>
      <div class="mt-3 sm:col-span-4">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900"> Enter your password</label>
       <div class="mt-2">
        <input v-model="password" id="password" name="password" type="password"  class="pl-3 w-80 block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <p v-if="missingPassword" class="text-red-500">Please enter a valid password</p>
      </div>
      <div>
        <button v-if="!isLoading" @click="handleRegistration" class="bg-cyan-500 hover:bg-cyan-600 text-white p-2 rounded-md font-semibold mt-4">
          Connection
        </button>
        <progress-circular v-else></progress-circular>
      </div>

    </div>
</template>