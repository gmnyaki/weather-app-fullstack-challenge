import axios from "axios";

const apiClient = axios.create({
  baseURL: "http://localhost/api", //Base URL
  headers: {
    "Content-Type": "application/json",
  },
});

export default apiClient;