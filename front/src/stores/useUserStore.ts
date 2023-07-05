import { defineStore } from 'pinia'
import ProfileService from '../services/ProfileService'

interface User {
    laravel_session:string,
    xsrftoken: string
}

export const useUserStore = defineStore("User", {
    state: () => ({
        user: null as User | null
    }),
    actions: {
        async register (credentials:{email:string, password: string}) {
            try {
                this.user = (await ProfileService.login(credentials)).data
                localStorage.setItem('user', JSON.stringify(this.user))
                return true
            } catch (error:any) {
                console.log(error)
                if(error.response.status === 422){
                    alert("Email / mot de passe incorrect")
                }
            }
        },
        async logout () {
            await ProfileService.logout()
            localStorage.removeItem('user')
            this.user = null
        }
    },
    getters: {
        isLogged: (state) => {
            const storedUser = localStorage.getItem('user')
            if(storedUser){
                state.user = JSON.parse(storedUser)
            }
            return !!state.user
        }
    }
})