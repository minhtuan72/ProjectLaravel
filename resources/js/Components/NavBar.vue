<script setup>
    import { Link } from '@inertiajs/vue3'
</script>

<template>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">DemoLrv10</a>
          <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
          <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <Link class="nav-link" :href=" route('logout') ">Sign out</Link>
            </li>
           
          </ul>
    </nav>
</template>

<style>

</style>