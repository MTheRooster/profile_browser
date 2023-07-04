import { defineStore } from 'pinia'
import axios from 'axios'

export const useUserStore = defineStore("User", {
    state: () => ({
        user: null
    }),
    actions: {
        async register (credentials:{email:string, password: string}) {
            try {
                const {data} = (await axios.post('//localhost:3000/register',credentials))
                this.user = data
                localStorage.setItem('user', JSON.stringify(data))
                axios.defaults.headers.common['Authorization'] = `Bearer ${data.token}`
                return true
            } catch {
                console.log('Erreur lors de l’authentification')
            }
        },
        logout () {
            this.user = null
            localStorage.removeItem('user')
            axios.defaults.headers.common['Authorization'] = null
        }
    },
    getters: {
        isLogged: (state) => !!state
    }
})