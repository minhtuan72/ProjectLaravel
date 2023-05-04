<script setup>
// import Layout from './Layout'
import { Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Layout.vue'
import { Head } from '@inertiajs/vue3'
defineProps({ user: Object })

</script>

<template>
  <Layout>
    <Head title="Profile" />
     <!-- Main -->
    <div id="test">
    <div class="main" >
        <h2>IDENTITY</h2>
        <div class="card">
            <Link :href="route('profile_edit')" class="fa fa-pen fa-xs edit" style="margin-left:95%">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </Link>
            <div class="card-body" style="background: none">
                <table>
                    <tbody>
                        <tr>
                            <img id="avatar" alt="image" v-bind:src="'upload/photo/'+user.photo">
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td>{{user.name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td>{{user.email}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>:</td>
                            <td>{{user.address}}</td>
                        </tr>
                        <tr>
                            <th>Hobbies</th>
                            <td>:</td>
                            <td>{{user.hobbies}}</td>
                        </tr>
                        <tr>
                            <th>Job</th>
                            <td>:</td>
                            <td>{{user.job}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>:</td>
                            <td><span v-html=user.description></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!-- End -->
  </Layout>
</template>
<style>
#avatar {
            height: 250px;
            width: 250px;
            border-radius:100%;
            -moz-border-radius:50%;
            -webkit-border-radius:50%;
            object-fit: circle(50px at 50% 50%); 
            margin: auto;
        }
</style>