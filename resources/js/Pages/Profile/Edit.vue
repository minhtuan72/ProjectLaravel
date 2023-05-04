<script setup>
// import Layout from './Layout'
import Layout from '@/Layouts/Layout.vue';
import { Head } from '@inertiajs/vue3';
import {ref} from "vue";
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";

defineProps({ prof: Object })

//lay id cac input
const form = useForm({
    photo: '',
    name: '',
    address: '',
    hobbies: '',
    job: '',
    description: '',
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
        <h2 style="color: #000">IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <div v-for="row in prof">
                <form @submit.prevent="submit">
                    <!-- Test -->
                    <!-- End Test -->
                    <table >
                        <tbody>
                            <tr >
                                <img id="avatar" alt="image"  v-bind:src="'upload/photo/'+row.photo">
                            </tr> 
                            <tr>
                                <th>Avatar</th>:
                                <td>
                                    <input  @change="previewImage" @input="form.photo = $event.target.files[0]" id="photo" type="file" class="form-control" name="photo"  required autocomplete="photo" style="width: 200px; margin-left: 5%;margin-bottom: 3%;">
                                    <div v-if="form.errors.photo">
                                        <span class="text-danger">{{ form.errors.photo }}</span>
                                    </div>
                                </td>    
                            </tr>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="name"  name="name" v-model="form.name" required style="width: 200px;">
                                            
                                            <div v-if="form.errors.name">
                                                <span class="text-danger">{{ form.errors.name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Address</strong>    
                                </td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="address" name="address" v-model="form.address" style="width: 200px;">
                                            <div v-if="form.errors.address">
                                                <span class="text-danger">{{ form.errors.address }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Hobbies</strong></td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="hobbies" name="hobbies"  v-model="form.hobbies" style="width: 200px;">
                                            <div v-if="form.errors.hobbies">
                                                <span class="text-danger">{{ form.errors.hobbies }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Job</strong></td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="job" name="job"  v-model="form.job" style="width: 200px;">
                                            <div v-if="form.errors.job">
                                                <span class="text-danger">{{ form.errors.job }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>:</td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <textarea cols="25" rows="5" id="description" name="description"  v-model="form.description">{{row.description}}</textarea>
                                            <div v-if="form.errors.description">
                                                <span class="text-danger">{{ form.errors.description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>  
                        </tbody>
                    </table>
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>    
                </div>
            </div>
        </div>
      </div>
    </div>
  </Layout>
</template>