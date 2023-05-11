<script setup>
// import Layout from './Layout'
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import {ref} from "vue";
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";

const prf = defineProps({ prof: Object })

//lay id cac input
const form = useForm({
    photo: '',
    name: prf.prof[0].name,
    address: prf.prof[0].address,
    hobbies: prf.prof[0].hobbies,
    job: prf.prof[0].job,
    description: prf.prof[0].description,
})

function submit() {
    form.post(route('profile.update'),{
        forceFormData: true,
    });
    // router.post(route('profile.update'), form)
  
}
function previewImage(e) {
    const file = e.target.files[0];
    this.url = URL.createObjectURL(file);
}


</script>

<template>
  <Layout>
    <div id="test">
    <div class="main" >
        <h2>IDENTITY</h2>
                <div v-for="row in prof">
                <form @submit.prevent="submit">
                    <!-- Test -->
                    <!-- End Test -->
                    <article class="profile" id="edit-profile">
                        <div class="profile-image">
                            <img id="avatar" alt="image" v-bind:src="'upload/photo/'+row.photo">
                        </div>
                        <div class="info">
                            <div class="cl">
                                <div class="left-column-edit">
                                    <i class="icon-avatar" ></i>
                                </div>
                                <div class="right-column-edit">  
                                    <input  @change="previewImage" @input="form.photo = $event.target.files[0]" id="photo" type="file" class="form-control" name="photo"  required autocomplete="photo">
                                    <div v-if="form.errors.photo">
                                        <span class="text-danger">{{ form.errors.photo }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="cl">
                                <div class="left-column-edit">
                                    <i class="icon-name" ></i>
                                </div>
                                <div class="right-column-edit">  
                                    <input type="text" class="form-control" id="name"  name="name" v-model="form.name" required >
                                    <div v-if="form.errors.name">
                                        <span class="text-danger">{{ form.errors.name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cl">
                                <div class="left-column-edit">
                                    <i class="icon-geo" ></i>
                                </div>
                                <div class="right-column-edit">  
                                    <input type="text" class="form-control" id="address" name="address" v-model="form.address" >
                                    <div v-if="form.errors.address">
                                        <span class="text-danger">{{ form.errors.address }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="cl">
                                <div class="left-column-edit">
                                    <i class="icon-hobby" ></i>
                                </div>
                                <div class="right-column-edit">  
                                    <input type="text" class="form-control" id="hobbies" name="hobbies"  v-model="form.hobbies" >
                                    <div v-if="form.errors.hobbies">
                                        <span class="text-danger">{{ form.errors.hobbies }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="cl">
                                <div class="left-column-edit">
                                    <i class="icon-company-2" ></i>
                                </div>
                                <div class="right-column-edit">  
                                    <input type="text" class="form-control" id="job" name="job"  v-model="form.job" >
                                    <div v-if="form.errors.job">
                                        <span class="text-danger">{{ form.errors.job }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="cl">
                                <div class="left-column-edit">
                                    <i class="icon-description" ></i>
                                </div>
                                <div class="right-column-edit">  
                                    <textarea class="form-control" cols="20" rows="5" id="description" name="description"  v-model="form.description">{{row.description}}</textarea>
                                    <div v-if="form.errors.description">
                                        <span class="text-danger">{{ form.errors.description }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cl"> 
                                <button class="btn btn-primary" type="submit" id="btn-edit-2">
                                    <div id="btn-rigth">  
                                        Update
                                    </div>
                                </button> 
                            </div>
                        </div>
                        <div class="cl">
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
                        </div>
                    </article>
                    
                </form>    
                </div>
            </div>
        </div>
  </Layout>
</template>
<style>
    #edit-profile {
        background-color: #ffffff;
    }
    .form-control {
        background-color: #eff2f5;
    }
    #avatar {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
        }
    .cl{
        height: 70px;
        width: 400px;
        /* background: #fff; */
    }
    .left-column-edit {
        width: 7%;
        height: 100%;
        /* background: #ddd; */
        float: left;
        margin-left: 0%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .right-column-edit {
        width: 85%;
        height: 100%;
        text-align: left;
        /* background: #959595; */
        float: right;
        font-size: medium;
        margin-right: 5%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .h2{
        color:black;
    }
    #btn-edit-2 {
        margin-top: 10%;
        color: #d5d5dd;
        background-color: #3a3b3c;
        border-color: #3a3b3c;
        width: 50%;
    }
</style>