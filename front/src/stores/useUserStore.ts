import { defineStore } from 'pinia'
import ProfileService from '../services/ProfileService'
import cookies from 'js-cookie'

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
            this.user = null
            await ProfileService.logout()
            localStorage.removeItem('user')
        }
    },
    getters: {
        isLogged: (state) => {return !!state.user}
    }
})