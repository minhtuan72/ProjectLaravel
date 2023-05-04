<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Layout.vue'
import { Head } from '@inertiajs/vue3'
defineProps({ match: Object })
</script>

<template>
    <Layout>
    <div class="main" style="width: 60%;margin-left: 15%;">
        <h2 style="color:#000"><strong>IDENTITY</strong></h2>
        <div class="card" style="width: 500px;">
            <div class="card-body" style="background: none;">
                <Link :href=" route('match.edit') " class="fa fa-pen fa-xs edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </Link>
                        <div>
                            <img id="image" v-bind:src="'/upload/photo/'+ match.photo">
                        </div>
                        <div>
                            <h3 style="margin-bottom: -2%;"><strong>&nbsp;{{match.name}}, {{match.detail.age}}</strong></h3>
                            <small style="font-size: small">&nbsp;&nbsp;&nbsp; {{match.detail.gender}}</small>
                        </div>
                        <div class="column">
                            <div class="left-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hearts" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.931.481c1.627-1.671 5.692 1.254 0 5.015-5.692-3.76-1.626-6.686 0-5.015Zm6.84 1.794c1.084-1.114 3.795.836 0 3.343-3.795-2.507-1.084-4.457 0-3.343ZM7.84 7.642c2.71-2.786 9.486 2.09 0 8.358-9.487-6.268-2.71-11.144 0-8.358Z"/>
                                </svg>
                            </div>
                            <div class="right-column">  
                                Dang tim kieu {{match.detail.looking_for}}   
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>
                            </div>
                            <div class="right-column">  
                                Dang o {{match.detail.location}}
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column" style="margin-left: 1%;">
                                <!-- <img src="https://img.icons8.com/external-filled-outline-berkahicon/60/000000/external-Height-health-app-filled-outline-berkahicon.png"/> -->
                                <img src="https://img.icons8.com/external-wanicon-solid-wanicon/60/1A1A1A/external-height-health-checkup-wanicon-solid-wanicon.png"/>
                            </div>
                            <div class="right-column">  
                                {{match.detail.height}} cm
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                    <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V.5ZM2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-1 2v1H2v-1h1Zm1 0h1v1H4v-1Zm9-10v1h-1V3h1ZM8 5h1v1H8V5Zm1 2v1H8V7h1ZM8 9h1v1H8V9Zm2 0h1v1h-1V9Zm-1 2v1H8v-1h1Zm1 0h1v1h-1v-1Zm3-2v1h-1V9h1Zm-1 2h1v1h-1v-1Zm-2-4h1v1h-1V7Zm3 0v1h-1V7h1Zm-2-2v1h-1V5h1Zm1 0h1v1h-1V5Z"/>
                                </svg>  
                            </div>
                            <div class="right-column">  
                                {{match.detail.company}}
                            </div>
                        </div>
                        <div class="column">
                            <div class="left-column" style="margin-left: 1%;">
                                <img src="https://img.icons8.com/external-jumpicon-glyph-ayub-irawan/32/1A1A1A/external-cigarette-wayfinding-jumpicon-glyph-jumpicon-glyph-ayub-irawan.png"/>
                            </div>
                            <div class="right-column">  
                                {{match.detail.smoking}} 
                            </div>
                        </div>
                
            </div>
        </div>
    </div>
</Layout>
</template>
<style>
       img#image {
           height: 350px;
           width: 100%;
           border-radius:100%;
           -moz-border-radius:5%;
           -webkit-border-radius:5%;
           /* object-fit: circle(50px at 50% 50%);  */
           margin: auto;
       }
       .column{
           height: 50px;
           /* background: #fff; */
       }
       .left-column {
           width: 7%;
           height: 100%;
           /* background: #ddd; */
           float: left;
           margin-left: 2%;
           display: flex;
           flex-direction: column;
           justify-content: center;
       }
       .right-column {
           width: 91%;
           height: 100%;
        
           /* background: #959595; */
           float: right;
           font-size: medium;
           margin: 0 auto;
           display: flex;
           flex-direction: column;
           justify-content: center;
       }
       
</style>