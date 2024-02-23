<template>
  <div class="antialiased bg-gray-50 dark:bg-gray-900">
    <!-- Herder part start -->
    <Header />
    <!-- Herder part end -->

    <!-- Navbar start -->
     <NavBer/>
    <!-- Navbar end -->

    <slot/>

  </div>
</template>
    <script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Header from "./Header.vue";
import NavBer from "./NavBer.vue";

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite();
});
</script>