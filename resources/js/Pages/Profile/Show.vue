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
        <article class="profile">
            <div class="profile-image">
                <img id="avatar" alt="image" v-bind:src="'upload/photo/'+user.photo">
            </div>
            <h2 class="profile-username">{{user.name}}</h2>
            <small class="profile-user-handle">{{user.email}}</small>

            <div class="profile-introduces">
                <h2>Introduces</h2>
            </div>
            <div class="info">
                <div class="column">
                    <div class="left-column">
                        <i class="icon-geo" ></i>
                    </div>
                    <div class="right-column">  
                        Den tu {{user.address}}
                    </div>
                </div>
                <div class="column">
                    <div class="left-column">
                        <i class="icon-hobby" ></i>
                    </div>
                    <div class="right-column">  
                        So thich {{user.hobbies}}
                    </div>
                </div>
                <div class="column">
                    <div class="left-column">
                        <i class="icon-company-2" ></i>
                    </div>
                    <div class="right-column">  
                        Cong viec hien tai {{user.job}}
                    </div>
                </div>
                <div class="column">
                    <div class="left-column">
                        <i class="icon-description" ></i>
                    </div>
                    <div class="right-column">  
                        Mo ta {{user.description}}
                    </div>
                </div>
                <div class="column"> 
                    <Link :href="route('profile_edit')">  
                    <button class="btn btn-primary" id="btn-edit">
                        <div id="btn-left">
                            <Link :href="route('profile_edit')" class="icon-edit-2"></Link> 
                        </div>
                        <div id="btn-rigth">  
                            Chinh sua trang ca nhan
                        </div>
                    </button> 
                    </Link> 
                </div>
            </div>
            <!-- <div class="profile-actions">
                <button class="btn btn--primary">Follow</button>
                <button class="btn btn--icon">
                    <i class="ph-export"></i>
                </button>
                <button class="btn btn--icon">
                    <i class="ph-dots-three-outline-fill"></i>
                </button>
            </div>
            <div class="profile-links">
                <a href="#" class="link link--icon">
                    <i class="ph-twitter-logo"></i>
                </a>
                <a href="#" class="link link--icon">
                    <i class="ph-facebook-logo"></i>
                </a>
                <a href="#" class="link link--icon">
                    <i class="ph-instagram-logo"></i>
                </a>
            </div> -->
        </article>
        <!-- <div class="card">
            <Link :href="route('profile_edit')" class="icon-edit">
            </Link>
            <div class="card-body" id="test">
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
        </div> -->
    </div>
    </div>
    <!-- End -->
  </Layout>
</template>
<style>
#avatar {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%; 
    }
#test {
    background: none;
}
.column{
           height: 35px;
           /* background: #fff; */
       }
       .left-column {
           width: 7%;
           height: 100%;
           /* background: #ddd; */
           float: left;
           margin-left: -30%;
           display: flex;
           flex-direction: column;
           justify-content: center;
       }
       .right-column {
           width: 100%;
           height: 100%;
           text-align: left;
           /* background: #959595; */
           float: right;
           font-size: medium;
           margin-right: 10%;
           display: flex;
           flex-direction: column;
           justify-content: center;
       }

#btn-edit {
    margin-top: 10%;
    /* margin-bottom: 10%; */
    color: #d5d5dd;
    background-color: #3a3b3c;
    border-color: #3a3b3c;
    width: 100%;
}
#btn-left {
    width: 7%;
    height: 100%;
    /* background: #ddd; */
    float: left;
    /* margin-left: -30%; */
    display: flex;
    flex-direction: column;
    justify-content: center;
}
#btn-right{
    width: 100%;
    height: 100%;
    text-align: left;
    /* background: #959595; */
    float: right;
    font-size: medium;
    /* margin-right: 10%; */
    display: flex;
    flex-direction: column;
    justify-content: center;
}

</style>