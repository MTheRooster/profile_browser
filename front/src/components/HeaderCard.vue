<script setup lang="ts">
import LoginButton from "./LoginButton.vue";
import IconMenuButton from "./IconMenuButton.vue";
import ModalCard from "./ModalCard.vue";
import ProfileForm from "./ProfileForm.vue"
import ProfileList from "./ProfileList.vue"
import { ref } from "vue";
import type { Ref } from "vue";
import type MenuContent from "../types/MenuContent";
import { useUserStore } from "../stores/useUserStore"

const store = useUserStore()

const emit = defineEmits<{reloadProfiles: []}>()

const addEditProfile: Ref<Boolean> = ref(false);
const showProfileTable: Ref<Boolean> = ref(false);
const editedProfile: Ref<Number|null> = ref(null)

const MenuContents: Ref<MenuContent[]> = ref([
  {title:"Ajouter un profil", callbackFunction: ()=>{addEditProfile.value = true}},
  {title:"Éditer un profil", callbackFunction: ()=>{showProfileTable.value = true}},
  {title:"Log out", callbackFunction:()=>{store.logout}},
]);

function handleProfileEdition(profileID:Number) {
  editedProfile.value = profileID
  showProfileTable.value = false
  addEditProfile.value = true
}

function closeProfile() {
  addEditProfile.value=false
  editedProfile.value=null
  emit('reloadProfiles')
}
</script>
<template>
  <div>
    <header class="justify-items-strech grid grid-flow-col py-5">
      <div></div>
      <h1 class="mb-6 text-center text-5xl font-bold">Profile Browser</h1>
      <div class="justify-self-left">
        <LoginButton v-if="!store.isLogged" />
        <icon-menu-button
          icon-path="./src/assets/user.svg"
          :menu-content="MenuContents"
          v-else
        />
      </div>
    </header>
    <modal-card v-if="addEditProfile" @close-modal="closeProfile" modal-title="New profile">
      <profile-form @close-form="closeProfile" :profileId="editedProfile"></profile-form>
    </modal-card>
    <modal-card v-if="showProfileTable" @close-modal="showProfileTable=false" modal-title="Profile List">
      <profile-list @edit-profile="handleProfileEdition"></profile-list>
    </modal-card>
  </div>
</template>
