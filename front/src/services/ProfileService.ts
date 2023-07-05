import axios from "axios";

axios.defaults.withCredentials = true

interface NewProfile {
  firstname: string;
  lastname: string;
  biography: string;
  public: Boolean;
  file: File | null | undefined
  id?:number
}

const apiClient = axios.create({
  baseURL: "http://localhost:8000/api",
  headers: {
    Accept: "application/json",
    "Content-Type": "multipart/form-data",
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

  updateProfile(profile: NewProfile) {
    return axios({
      method: 'put',
      url: `http://localhost:8000/api/profiles/${profile.id}`,
      headers: {
        Accept: "application/json",
      },
      withCredentials: true,
      data: profile
    });
  },

  deleteProfile(profileId: Number) {
    return apiClient.delete(`/profiles/${profileId}`);
  },
};
