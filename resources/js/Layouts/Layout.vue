<script setup>
import { Link } from '@inertiajs/vue3'
import NavBar from '@/Components/NavBar.vue';
import SideBar from '@/Components/SideBar.vue';
import Aside from '@/Components/Aside.vue';

</script>


<template>
  <div class="LayoutDefault">
    <nav-bar />

    <div class="container mt-2">
      <div class="row">
        <div class="col-md-2">
          <side-bar />
        </div>
        <div class="col-md-6">
          <main class="LayoutDefault__main">
            <slot />
          </main>
        </div>
        <div class="col-md-3">
          <Aside />
        </div>
      </div>
    </div>

  </div>
</template>

<style scoped>

</style>