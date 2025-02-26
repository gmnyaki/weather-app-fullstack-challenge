<template>
  <div class="container mx-auto p-6">
    <h1 class="text-center text-blue-600 text-2xl font-semibold">User List</h1>

    <div v-if="loading" class="text-center text-blue-400">Loading...</div>
    <div v-else-if="error" class="bg-red-100 text-red-600 p-2 rounded-md">{{ error }}</div>

    <table v-if="users.length" class="w-full mt-4 border border-blue-300 shadow-md rounded-lg">
      <thead class="bg-blue-500 text-white">
        <tr>
          <th class="py-2 px-4">Name</th>
          <th class="py-2 px-4">Email</th>
          <th class="py-2 px-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id" class="border-t border-blue-300 hover:bg-blue-100">
          <td class="py-2 px-4">{{ user.name }}</td>
          <td class="py-2 px-4">{{ user.email }}</td>
          <td class="py-2 px-4 text-center">
            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700" @click="openModal(user)">
              View
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    
    <div v-else-if="!loading && users.length === 0" class="text-center text-yellow-600 bg-yellow-100 p-2 rounded-md mt-4">
      No users found.
    </div>

    <!-- Pagination -->
    <div v-if="pagination.last_page > 1" class="flex justify-center items-center mt-4 space-x-4">
      <button class="bg-blue-500 text-white px-3 py-1 rounded disabled:opacity-50" :disabled="pagination.current_page === 1" @click="changePage(pagination.current_page - 1)">
        Previous
      </button>
      
      <span class="text-blue-600">Page {{ pagination.current_page }} of {{ pagination.last_page }}</span>
      
      <button class="bg-blue-500 text-white px-3 py-1 rounded disabled:opacity-50" :disabled="pagination.current_page === pagination.last_page" @click="changePage(pagination.current_page + 1)">
        Next
      </button>
    </div>

    <WeatherModal :user="selectedUser" :isOpen="isModalOpen" @close="closeModal" />
  </div>
</template>

<script setup>
import { ref, onMounted, computed, watch } from "vue";
import { useUserStore } from "@/stores/userStore";
import WeatherModal from "@/components/WeatherModal.vue";

const userStore = useUserStore();

const loading = computed(() => userStore.loading);
const error = computed(() => userStore.error);
const users = computed(() => userStore.users);
const pagination = computed(() => userStore.pagination);

const selectedUser = ref(null);
const isModalOpen = ref(false);

onMounted(async () => {
  await userStore.fetchUsers(1); 
});

const openModal = (user) => {
  selectedUser.value = user;
  isModalOpen.value = true;
};

const closeModal = () => {
  isModalOpen.value = false;
};

const changePage = async (page) => {
  if (page >= 1 && page <= pagination.value.last_page) {
    await userStore.fetchUsers(page);
  }
};
</script>

<style scoped>
th, td {
  text-align: center;
}
</style>
