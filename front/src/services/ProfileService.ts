import axios from "axios";
import type Profile from "../types/Profile";

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
});

export default {
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
