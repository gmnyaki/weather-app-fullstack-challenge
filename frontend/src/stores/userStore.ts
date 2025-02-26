import { defineStore } from "pinia";
import apiClient from "@/services/api";

interface User {
  id: number;
  name: string;
  email: string;
  latitude: number;
  longitude: number;
}

interface Pagination {
  current_page: number;
  last_page: number;
  per_page: number;
  total: number;
}

export const useUserStore = defineStore("user", {
  state: () => ({
    users: [] as User[],
    pagination: {} as Pagination,
    loading: false,
    error: null as string | null,
  }),
  actions: {
    async fetchUsers(page: number = 1) {
      this.loading = true;
      try {
        const response = await apiClient.get(`/users?page=${page}`);
        this.users = response.data.users.data; 
        this.pagination = {
          current_page: response.data.users.current_page,
          last_page: response.data.users.last_page,
          per_page: response.data.users.per_page,
          total: response.data.users.total,
        };
      } catch (error: any) {
        this.error = error.message;
      } finally {
        this.loading = false;
      }
    },
  },
});