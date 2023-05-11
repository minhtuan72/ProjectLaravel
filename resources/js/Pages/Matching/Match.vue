<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Layout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({ user: Object })

function dele($id){
    console.log("nhay vao delete: "+$id);
    let test = 'card_'+$id;
    //console.log("$test: "+test);
    var x = document.getElementById(test);
    if (x.style.display === 'none') {
        x.style.display = 'block';        
    } else {
        x.style.display = 'none';
    }
}
function hide($id){
    console.log("nhay vao delete");
    let test = 'btn_'+$id;
    var x = document.getElementById(test);
    x.style.display = 'none';
    $.ajax({
        type: "POST",
        cache: false,
        url: "{{ route('match.add') }}",
        data: {
            "_token": '{{csrf_token()}}',
            id: $id, 
        },
        dataType: "text",
        success: function(data){
            console.log(data);
                // alert('Da gui loi moi'); 
                // location.reload();  
                // toastr.success('Create successfully !');        
                $('#result').html(data);
                // alert('thanh cong!');
        },
        error: function(data){
            alert('that bai!');
            // alert(data);
        },
        complete: function(){
            console.log("nhay vao");
        }
    });
}
</script>

<template>
    <Layout>
    <!-- <div class="container">
    <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
        <!-- <h3 class="text-center text-success"  style="background-color: #fff;">{{Auth()->user()->name}}</h3> -->
        <div class="btn">
            <Link name="" id="btn-left-match" class="btn btn-secondary" :href=" route('match.profile') " role="button">Profile</Link>
            <Link name="" id="btn-right-match" class="btn btn-secondary" :href=" route('posts.create') " role="button">Ideal Match</Link>
        </div>
       
        <div v-for="m in user">
            <div class="card2" v-bind:id="'card_'+m.id" style="display:block">
                <div class="banner2">
                    <Link  :href="route('match.profile_friend', m.id)"> 
                        <img class="avatar-match" v-bind:src="'/upload/photo/'+m.photo">
                    </Link>
                </div>
                <!-- <div class="menu2">
                    <div class="opener2"><span></span><span></span><span></span></div>
                </div> -->
                <h2 class="name"><strong>&nbsp;{{m.name}}, {{m?.detail?.age}} years</strong></h2>
                <div class="title">{{m?.detail?.gender}}</div>
                <div class="desc"><span v-html=m.description></span></div>
                <div class="actions">
                    <div class="follow-info">
                        <h2><a href="#"><span>12</span><small>Followers</small></a></h2>
                        <h2><a href="#"><span>30</span><small>Following</small></a></h2>
                    </div>
                    <div class="delete-btn">
                        <button  @click="dele(m.id)">Delete</button>
                    </div>
                    <div class="match-btn">
                        <button v-bind:id="'btn_'+m.id"   @click="hide(m.id)">Match</button>
                    </div>
                </div>
            </div>

            <!-- <div class="card" v-bind:id="'card_'+m.id" style="display:block">
                <div class="card-in">
                <div class="group">
                    <Link  :href="route('match.profile_friend', m.id)"> 
                        <img style="  border-radius:100%;
                                        -moz-border-radius:0;
                                        -webkit-border-radius:0;  
                                        width: 100%; boder:1px solid red; height:350px; "
                                v-bind:src="'/upload/photo/'+m.photo">
                    </Link>
                </div>
                <div>
                   
                    <h3 style="margin-bottom: 0;"><strong>&nbsp;{{m.name}}, {{m.detail.age??null}}</strong></h3>
                    
                    <div style="font-size: small ">&nbsp;&nbsp;&nbsp; {{m.detail.gender??null}}</div>
                    
                    <div style="font-size: larger; margin-left:3%"><small v-html=m.description></small></div>
                </div>
                <div class="row">
                    <div style="margin-top: 1%;" class="col-1">
                        
                    </div>
                    <div class="col-9">
                        <h3 style="margin-left:3%; margin-top: 2%; text-align: left; "> </h3>
                    </div>
                </div>
                    <hr id="t" name="t" style="margin-top: 0rem;
                        margin-bottom: 1rem;
                        
                        border-top: 2px solid rgba(0,0,0,.1);"/>
                    <div>
                        <h4 style="text-align: center; "> </h4>
                    </div>

                    <div style="margin:auto;  width: 90%;" >
                        <center>
                        
                        
                            <button @click="dele(m.id)" class="codepro-custom-btn codepro-btn-17" target="blank" title="Code Pro"><span>Delete</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                    </svg>
                                </span>
                            </button>
                            
                            
                            <button v-bind:id="'btn_'+m.id"   @click="hide(m.id)"  class="codepro-custom-btn codepro-btn-12" target="blank" title="Code Pro" >
                                <span>Match</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-heart-half" viewBox="0 0 16 16">
                                        <path d="M8 2.748v11.047c3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </span>
                            </button>
                            
                        </center>
                    </div>
                </div>         
            </div> -->
        <!-- </div>
            <br/> -->
        </div>
    </Layout>
</template>
<style>
.btn{
    width: 100%; 
}
#btn-left-match {
    width: 51.5%; 
    margin-left: -2%;
    float: left;
}
#btn-right-match {
    width: 51.5%; 
    float: right;
    margin-right: -2%;
}
.card-in {
    background-color:#fff; 
    border: 2px outset #fff; 
}
</style>