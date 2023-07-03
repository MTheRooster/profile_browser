import axios from 'axios'
import type Profile from '../types/Profile'

interface NewProfile {
    firstname: string,
    lastname: string,
    biography: string
}

const apiClient = axios.create({
    baseURL: '//localhost:3000',
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
})

export default {
    getProfiles() {
        return apiClient.get('/profile')
    },

    createProfile(profile: NewProfile) {
        return apiClient.post('/profile', profile)
    },

    updateProfile(profile:Profile) {
        return apiClient.put(`/profile/${profile.id}`, profile)
    },

    deleteProfile(profileId: Number) {
        return apiClient.delete(`/profile/${profileId}`)
    }
}