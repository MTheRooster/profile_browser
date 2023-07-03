<script setup lang="ts">
import { ref } from "vue"
import data from "../data/profiles";
import Profile from "../types/Profile"

const profiles = ref<Profile[]>([]);
profiles.value = data

const emit = defineEmits<{editProfile: [id:number]}>()

</script>
<template>
    <ul role="list" class="divide-y divide-gray-100">
        <li v-for="(profile,index) in profiles " :key="index" class="flex justify-between gap-x-6 py-5">
            <div class="flex gap-x-4">
                <img class="h12 w-12 flex-none rounded-full bg-gray-50" src="../assets/Angelina_Jolie.jpg" alt=""/>
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ profile.firstname }} {{ profile.lastname }}</p>
                </div>
            </div>
            <div class=" md:flex md:flex-col md:items-end">
                <img class="hover:bg-red-500 cursor-pointer rounded-full" src="../assets/trash-2.svg" />
                <img class="hover:bg-blue-500 cursor-pointer rounded-full" src="../assets/edit-2.svg" @click="emit('editProfile',profile.id)"/>
            </div>
        </li>
    </ul>
</template>