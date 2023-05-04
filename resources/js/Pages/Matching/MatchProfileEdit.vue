<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Layout.vue'
import { Head } from '@inertiajs/vue3'
import { useForm } from "@inertiajs/vue3";
defineProps({ match: Object })


const form = useForm({
    checkedLooks: [],
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
</script>

<template>
    <Layout>
    <div class="container" style="margin-left: 10%;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Edit Profile Match</strong></div>
                <div class="card-body" style="background: #fff">
                    <form method="post" action="{{ route('match.update') }}" enctype="multipart/form-data">
                        <!-- Test -->
                            <!-- {{match.detail.looking_for}} -->
                        <!-- end test -->
                        <div class="form-group">
                            <label class="label"><strong>Location: </strong></label>
                            <input type=text name=location class="form-control" :value="match.detail.location" required/>
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Gender: </strong></label>
                            <br><input type="radio" name="gender" value="gender-1"> Nam<br>
                            <input type="radio" name="gender" value="gender-2" checked> Nữ<br>
                            <input type="radio" name="gender" value="gender-0"> Khác
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Looking for: </strong></label><br>
                                <input type="checkbox" name="looking_for[]" id="looking_for1" value="looking_for-1" v-model="checkedLooks">
                                <label for="looking_for1">Nguoi tro chuyen</label><br>
                                <input type="checkbox" name="looking_for[]" id="looking_for2" value="looking_for-2" v-model="checkedLooks">
                                <label for="looking_for2">Quan he ban be</label><br>
                                <input type="checkbox" name="looking_for[]" id="looking_for3" value="looking_for-3" v-model="checkedLooks">
                                <label for="looking_for3">Hen ho khong rang buoc</label><br>
                                <input type="checkbox" name="looking_for[]" id="looking_for4" value="looking_for-4" v-model="checkedLooks">
                                <label for="looking_for4">Moi quan he lau dai</label><br>
                                <input type="checkbox" name="looking_for[]" id="looking_fornull" value="looking_for-null" v-model="checkedLooks" checked>
                                <label for="looking_fornull">Khong muon tiet lo</label><br>
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Height(cm): </strong></label><br>
                            <input type="number" name="heightInput" class="form-control" min="50" max="200" :value="match.detail.height" oninput="this.form.height.value=this.value" style="width:70px" required/>
                            <input type=range name=height class="form-control"  min="50" max="200" :value="match.detail.height" oninput="this.form.heightInput.value=this.value"/>
                            
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Age: </strong></label>
                            <input type=number name=age class="form-control" min="5" max="200" :value="match.detail.age" style="width:70px" required/>
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Languages spoken: </strong></label><br>
                                <input type="checkbox" name="languages_spoken[]" id="languages_spoken1" value="languages_spoken-1" checked>
                                <label for="languages_spoken1">Tieng Viet</label><br>
                                <input type="checkbox" name="languages_spoken[]" id="languages_spoken2" value="languages_spoken-2">
                                <label for="languages_spoken2">Tieng Anh</label><br>
                                <input type="checkbox" name="languages_spoken[]" id="languages_spoken3" value="languages_spoken-3">
                                <label for="languages_spoken3">Tieng Trung</label><br>
                                <input type="checkbox" name="languages_spoken[]" id="languages_spoken4" value="languages_spoken-4">
                                <label for="languages_spoken4">Tieng Han</label><br>
                                <input type="checkbox" name="languages_spoken[]" id="languages_spoken5" value="languages_spoken-5">
                                <label for="languages_spoken5">Tieng Nhat</label><br>
                                <input type="checkbox" name="languages_spoken[]" id="languages_spoken0" value="languages_spoken-0">
                                <label for="languages_spoken0">Khac</label><br>
                        </div>

                        <div class="form-group">
                            <label class="label"><strong>Cong viec va hoc van </strong></label>
                        </div>

                        <div class="form-group">
                            <label class="label"><strong>Company: </strong></label>
                            <input type=text name=company class="form-control" :value="match.detail.company" />
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>High school: </strong></label>
                            <input type=text name=high_school class="form-control" :value="match.detail.high_school" />
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Grad school: </strong></label>
                            <input type=text name=grad_school class="form-control" :value="match.detail.grad_school" />
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Education level: </strong></label>
                            <br><input type="radio" name="education_level" value="education_level-1"> Trung hoc<br>
                            <input type="radio" name="education_level" value="education_level-2"> Cao dang/Dai hoc<br>
                            <input type="radio" name="education_level" value="education_level-3"> Cao hoc<br>
                            <input type="radio" name="education_level" value="education_level-null" checked> Khong muon tiet lo
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Your kids: </strong></label>
                            <br><input type="radio" name="your_kids" value="your_kids-1"> Khong, toi chua co con<br>
                            <input type="radio" name="your_kids" value="your_kids-2"> Co, toi co con<br>
                            <input type="radio" name="your_kids" value="your_kids-null" checked> Khong muon tiet lo<br>
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Smoking: </strong></label>
                            <br><input type="radio" name="smoking" value="smoking-1"> Co, thuong xuyen<br>
                            <input type="radio" name="smoking" value="smoking-2" > Co, thinh thoang<br>
                            <input type="radio" name="smoking" value="smoking-3" > Khong, chua bao gio<br>
                            <input type="radio" name="smoking" value="smoking-null" checked> Khong muon tiet lo<br>
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Drinking: </strong></label>
                            <br><input type="radio" name="drinking" value="drinking-1"> Co, thuong xuyen<br>
                            <input type="radio" name="drinking" value="drinking-2" > Co, thinh thoang<br>
                            <input type="radio" name="drinking" value="drinking-3" > Khong, chua bao gio<br>
                            <input type="radio" name="drinking" value="drinking-null" checked> Khong muon tiet lo<br>
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Religion: </strong></label>
                            <br><input type="radio" name="religion" value="religion-1" > Vo than<br>
                            <input type="radio" name="religion" value="religion-2" > Cong giao<br>
                            <input type="radio" name="religion" value="religion-3" > Co doc giao<br>
                            <input type="radio" name="religion" value="religion-4" > Do thai<br>
                            <input type="radio" name="religion" value="religion-5" > Hoi giao<br>
                            <input type="radio" name="religion" value="religion-6" > Phat giao<br>
                            <input type="radio" name="religion" value="religion-0" > Khac<br>
                            <input type="radio" name="religion" value="religion-null" checked> Khong muon tiet lo<br>
                        </div>
                        <div class="form-group">
                            <label class="label"><strong>Interests: </strong></label><br>
                                <input type="checkbox" name="interests[]" id="interests1" value="interests-1" >
                                <label for="interests1">Am thuc</label><br>
                                <input type="checkbox" name="interests[]" id="interests2" value="interests-2">
                                <label for="interests2">The thao</label><br>
                                <input type="checkbox" name="interests[]" id="interests3" value="interests-3">
                                <label for="interests3">Doc sach</label><br>
                                <input type="checkbox" name="interests[]" id="interests4" value="interests-4">
                                <label for="interests4">Hoi hoa</label><br>
                                <input type="checkbox" name="interests[]" id="interests5" value="interests-5">
                                <label for="interests5">Am nhac</label><br>
                                <input type="checkbox" name="interests[]" id="interests6" value="interests-6">
                                <label for="interests6">Dong vat</label><br>
                                <input type="checkbox" name="interests[]" id="interests7" value="interests-7">
                                <label for="interests7">Du lich</label><br>
                                <input type="checkbox" name="interests[]" id="interests0" value="interests-0" checked>
                                <label for="interests0">Khac</label><br>
                        </div>
                        <input id="id" type="hidden" class="form-control" name="user_id" value ="{{Auth::user()->id}}">
                        

                        <div class="form-group">
                            <input style="width: 30%; border-radius: 10px 10px 10px;" type=submit class="btn btn-success" value="Edit"/>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</Layout>
</template>
<style>

</style>