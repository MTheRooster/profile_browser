import axios from "axios";
import type Profile from "../types/Profile";

axios.defaults.withCredentials = true

interface NewProfile {
  firstname: string;
  lastname: string;
  biography: string;
  public: Boolean;
}

const apiClient = axios.create({
  baseURL: "http://localhost:8000/api",
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
  withCredentials: true
});

function csrfProtection() {
  return axios({
    method: 'get',
    url: 'http://localhost:8000/sanctum/csrf-cookie',
    withCredentials: true
})}

export default {

  async login(credentials:{email:string, password: string}) {
    await csrfProtection()
    await  axios({
      method: 'post',
      url: 'http://localhost:8000/login',
      withCredentials: true,
      data: {
          email: credentials.email,
          password: credentials.password
      }
  })
    return apiClient.get("/user")
  },

  async logout(){ 
    await axios({
    method: 'post',
    url: 'http://localhost:8000/logout',
    withCredentials: true
    })

},

  getUsersProfiles(){
    return apiClient.get("/user/1/profiles")
  },

  getProfiles() {
    return apiClient.get("/profiles");
  },

  showProfile(profileId: number){
    return apiClient.get(`/profiles/${profileId}`)
  },

  createProfile(profile: NewProfile) {
    return apiClient.post("/profiles", profile);
  },

  updateProfile(profile: Profile) {
    return apiClient.put(`/profiles/${profile.id}`, profile);
  },

  deleteProfile(profileId: Number) {
    return apiClient.delete(`/profiles/${profileId}`);
  },
};
