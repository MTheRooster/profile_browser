<script setup lang="ts">
import { onMounted, ref } from "vue"
import Profile from "../types/Profile"
import ProfileService from "../services/ProfileService";
import ProgressCircular from "./ProgressCircular.vue";

const profiles = ref<Profile[]>([]);
const currentlyDeleting = ref<number[]>([])

const emit = defineEmits<{editProfile: [id:number],deleteProfile: []}>()

onMounted(async ()=>{
    profiles.value = (await ProfileService.getUsersProfiles()).data
})

async function deleteProfile(profileId: number, index:number){
    try{
        currentlyDeleting.value.push(index)
        await ProfileService.deleteProfile(profileId)
        profiles.value = (await ProfileService.getUsersProfiles()).data
        emit('deleteProfile')
    } catch (error) {
        console.log(error)
    }
    currentlyDeleting.value.splice(currentlyDeleting.value.findIndex((value)=>value===index),1)
}

</script>
<template>
    <ul role="list" class="divide-y divide-gray-100">
        <li v-for="(profile,index) in profiles " :key="index" class="flex justify-between gap-x-6 py-5">
            <div class="flex gap-x-4">
                <img v-if="profile.imagename" class="h12 w-12 flex-none rounded-full bg-gray-50" :src="`http://localhost:8000/storage/images/${profile.imagename}`" alt=""/>
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ profile.firstname }} {{ profile.lastname }}</p>
                </div>
            </div>
            <progress-circular v-if="currentlyDeleting.includes(index)"></progress-circular>
            <div  v-else class=" md:flex md:flex-col md:items-end">
                <img class="hover:bg-red-500 cursor-pointer rounded-full" src="../assets/trash-2.svg" @click="deleteProfile(profile.id, index)" />
                <img class="hover:bg-blue-500 cursor-pointer rounded-full" src="../assets/edit-2.svg" @click="emit('editProfile',profile.id)"/>
            </div>
        </li>
    </ul>
</template>