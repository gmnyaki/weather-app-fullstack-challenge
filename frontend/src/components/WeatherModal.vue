<template>
  <div v-if="isOpen" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white w-96 p-6 rounded-lg shadow-lg">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Weather for {{ user.name }}</h2>

      <div v-if="weatherLoading" class="text-blue-600 font-medium">Loading weather...</div>
      <div v-if="weatherError" class="text-red-500">{{ weatherError }}</div>

      <div v-if="weather" class="mt-4 space-y-2">
        <p class="text-gray-700"><span class="font-semibold">Temperature:</span> {{ weather.main.temp }}°C</p>
        <p class="text-gray-700"><span class="font-semibold">Conditions:</span> {{ weather.weather[0].description }}</p>
      </div>

      <div class="mt-6 flex justify-end">
        <button 
          @click="closeModal" 
          class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md transition">
          Close
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, watch } from "vue";
import apiClient from "@/services/api";

const props = defineProps({
  user: Object,
  isOpen: Boolean,
});

const emit = defineEmits(['close']);

const weather = ref(null);
const weatherLoading = ref(false);
const weatherError = ref(null);

watch(() => props.isOpen, async (isOpen) => {
  if (isOpen) {
    weather.value = null;
    weatherError.value = null;
    weatherLoading.value = true;

    try {
      const response = await apiClient.get(`/users/${props.user.id}/weather`);
      weather.value = response.data.weather;
    } catch (error) {
      weatherError.value = error.message;
    } finally {
      weatherLoading.value = false;
    }
  }
});

const closeModal = () => {
  emit('close');
};
</script>
