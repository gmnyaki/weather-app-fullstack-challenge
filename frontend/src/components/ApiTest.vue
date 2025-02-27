<script setup lang="ts">
import { ref, onMounted } from "vue";
import apiClient from "@/services/api";

const message = ref("Pinging the API...");

onMounted(async () => {
  try {
    const response = await apiClient.get("/");
    message.value = response.data.message;
  } catch (error) {
    message.value = "Failed to ping the API.";
  }
});
</script>

<template>
  <div>
    <p>{{ message }}</p>
  </div>
</template>