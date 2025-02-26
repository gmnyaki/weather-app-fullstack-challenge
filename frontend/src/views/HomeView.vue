<script setup lang="ts">
import ApiTest from "@/components/ApiTest.vue";
</script>

<template>
  <main class="min-h-screen flex flex-col items-center bg-blue-100 text-gray-800 p-6">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-3xl text-center">
      <h1 class="text-3xl font-bold text-blue-600 mb-4">Weather Forecast</h1>
      <p class="text-lg text-gray-600 mb-6">
        Get the latest weather updates based on user locations.
      </p>

      <div class="border-t border-blue-300 pt-6">
        <ApiTest />
      </div>
    </div>
  </main>
</template>
