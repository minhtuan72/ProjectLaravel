<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Layout.vue'
import { Head } from '@inertiajs/vue3'
defineProps({ match: Object })
</script>

<template>
    <Layout>
        <article class="profile" id="match-profile">
            <div class="profile-image">
                <img id="image" v-bind:src="'/upload/photo/'+ match.photo">
            </div>

            <h2 class="profile-username">{{match.name}}, {{match?.detail?.age}}</h2>
            <small class="profile-user-handle"> {{match.detail.gender}}</small>

            <div class="info">
                <div class="column-match">
                    <div class="left-column-match">
                        <i class="icon-looking" ></i>
                    </div>
                        <div class="right-column-match"> 
                                Dang tim kieu {{match.detail.looking_for}}   
                        </div>
                </div>
                <div class="column-match">
                    <div class="left-column-match">
                        <i class="icon-geo-2" ></i>
                    </div>
                    <div class="right-column-match">  
                        Dang o {{match.detail.location}}
                    </div>
                 </div>

                <div class="column-match">
                    <div class="left-column-match">
                        <i class="icon-height" ></i>
                    </div>
                    <div class="right-column-match">  
                        {{match.detail.height}} cm
                    </div>
                </div>

                <div class="column-match">
                    <div class="left-column-match">
                        <i class="icon-company" ></i>
                    </div>
                    <div class="right-column-match">  
                        {{match?.detail?.company}}    
                    </div>
                </div>

                <div class="column-match">
                    <div class="left-column-match">
                        <i class="icon-smoking" ></i>
                    </div>
                    <div class="right-column-match">  
                        {{match.detail.smoking}}
                    </div>
                </div>

                <div class="column-match"> 
                    <Link :href=" route('match.edit') ">
                        <button class="btn btn-primary" type="submit" id="btn-edit-match">
                            <div id="btn-rigth-match">  
                                Edit
                            </div>
                        </button> 
                    </Link>
                </div>
            </div>
        </article>
    </Layout>
</template>
<style>
        #match-profile {
            background-color: #ffffff;
            color:black;
        }
        img#image {
           height: 350px;
           width: 100%;
           border-radius:100%;
           -moz-border-radius:5%;
           -webkit-border-radius:5%;
           /* object-fit: circle(50px at 50% 50%);  */
           margin: auto;
       }
       .column-match{
           height: 50px;
           /* background: #fff; */
       }
       .left-column-match {
           width: 7%;
           height: 100%;
           /* background: #ddd; */
           float: left;
           /* margin-left: 2%; */
           display: flex;
           flex-direction: column;
           justify-content: center;
       }
       .right-column-match {
           width: 91%;
           height: 100%;
           text-align: left;
           /* background: #959595; */
           float: right;
           font-size: medium;
           margin-right: -8%;
           display: flex;
           flex-direction: column;
           justify-content: center;
       }
       #btn-edit-match {
            margin-top: 10%;
            color: #d5d5dd;
            background-color: #3a3b3c;
            border-color: #3a3b3c;
            width: 50%;
        }
       
</style>