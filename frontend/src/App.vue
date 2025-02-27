<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <header class="bg-blue-600 text-white shadow-md">
    <div class="max-w-6xl mx-auto flex justify-between items-center p-4">
      <h1 class="text-xl font-semibold tracking-wide">Weather App</h1>
      <nav class="flex space-x-6">
        <RouterLink 
          to="/" 
          class="hover:bg-blue-500 px-4 py-2 rounded transition"
          active-class="bg-blue-500"
        >
          Home
        </RouterLink>
        <RouterLink 
          to="/users" 
          class="hover:bg-blue-500 px-4 py-2 rounded transition"
          active-class="bg-blue-500"
        >
          User List
        </RouterLink>
      </nav>
    </div>
  </header>
  <RouterView />
</template>
