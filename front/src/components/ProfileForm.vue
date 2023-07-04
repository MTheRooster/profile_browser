<script setup lang="ts">
import { ref, onMounted } from "vue";
import data from "../data/profiles";
import Profile from "../types/Profile";
import profileService from "../services/ProfileService"
import ProgressCircular from "./ProgressCircular.vue"

const props = defineProps<{
  profileId: number | null
}>()

const emit = defineEmits<{closeForm: []}>()

const firstname = ref<string>("");
const lastname = ref<string>("");
const biography = ref("");
const file = ref<File | null>();
const available = ref<Boolean>(false);
const error = ref<Boolean>(false)
const isLoading = ref<Boolean>(false)

onMounted(async ()=>{

  if(props.profileId){
    const profile = (await profileService.showProfile(props.profileId)).data
    if (profile){
      firstname.value = profile.firstname
      lastname.value = profile.lastname
      biography.value = profile.biography
      available.value = !!profile.public
    }
  }})


function handleFileInput(event: Event) {
  const target = event.target as HTMLInputElement;
  if (target && target.files) {
    file.value = target.files[0];
  }
}

async function handleSubmit(){
  isLoading.value = true
  if(!props.profileId){
    try{
      await profileService.createProfile({
      firstname:firstname.value,
      lastname:lastname.value,
      biography:biography.value,
      public: available.value
    })
    
    } catch {
      error.value = true
    }
  } else {
    try {
      await profileService.updateProfile({
      firstname:firstname.value,
      lastname:lastname.value,
      biography:biography.value,
      public: available.value,
      id: props.profileId
    })
    } catch {
      error.value = true
    }
  }
  isLoading.value = false
  emit('closeForm');
}

</script>
<template>
  <div>
    <div class="mt-3 sm:col-span-4">
      <label
        for="profileFirstName"
        class="block text-sm font-medium leading-6 text-gray-900"
      >
        First name</label
      >
      <div class="mt-2">
        <input
          v-model="firstname"
          id="profileFirstName"
          name="firstName"
          type="text"
          class="block w-80 rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        />
      </div>
    </div>
    <div class="mt-3 sm:col-span-4">
      <label
        for="profileLastName"
        class="block text-sm font-medium leading-6 text-gray-900"
      >
        Last name</label
      >
      <div class="mt-2">
        <input
          v-model="lastname"
          id="profileLastName"
          name="lastName"
          type="text"
          class="block w-80 rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        />
      </div>
    </div>
    <div class="col-span-full mt-3">
      <label
        for="about"
        class="block text-sm font-medium leading-6 text-gray-900"
        >Biography</label
      >
      <div class="mt-2">
        <textarea
          v-model="biography"
          id="about"
          name="about"
          rows="3"
          class="pl-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        ></textarea>
      </div>
    </div>

    <div class="col-span-full mt-3">
      <label
        for="cover-photo"
        class="block text-sm font-medium leading-6 text-gray-900"
        >Cover photo</label
      >
      <div
        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
      >
        <div class="text-center">
          <svg
            class="mx-auto h-12 w-12 text-gray-300"
            viewBox="0 0 24 24"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
              clip-rule="evenodd"
            />
          </svg>
          <div class="mt-4 flex text-sm leading-6 text-gray-600">
            <label
              for="file-upload"
              class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"
            >
              <span>Upload a file</span>
              <input
                @change="handleFileInput"
                id="file-upload"
                name="file-upload"
                type="file"
                class="sr-only"
              />
            </label>
            <p class="pl-1">or drag and drop</p>
          </div>
          <p class="text-xs leading-5 text-gray-600">
            PNG, JPG, GIF up to 10MB
          </p>
        </div>
      </div>
    </div>
    <div class="relative flex gap-x-3 pt-1">
              <div class="flex h-6 items-center">
                <input v-model="available" id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
              </div>
              <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Publicly available</label>
              </div>
            </div>
    <div class="text-red-500" v-if="error">
      <p>Error during form submission</p>
    </div>

    <div>
      <button
        v-if="!isLoading"
        class="mt-4 rounded-md bg-cyan-500 p-2 font-semibold text-white hover:bg-cyan-600"
        @click="handleSubmit"
      >
        Submit
      </button>
      <progress-circular v-else></progress-circular>
    </div>
  </div>
</template>
