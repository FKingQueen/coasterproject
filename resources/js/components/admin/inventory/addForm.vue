<template>
    <div class="p-2 ">
        <div class="m-5 bg-white shadow-inner shadow-lg rounded px-20 py-5">
            <Breadcrumb separator=">">
                <BreadcrumbItem to="/admin/inventoryPlatform">Inventory</BreadcrumbItem>
                <BreadcrumbItem>New Inventory Form</BreadcrumbItem>
            </Breadcrumb>
            <a-button @click="this.$router.push('/admin/inventoryPlatform')" class="my-3">Back</a-button>
            <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" label-position="top" class="px-10">
                
                <FormItem label="Image (atleast 1)" prop="image">
                    <Upload type="drag" ref="uploads"
                        :headers="{ 'x-csrf-token': token, 'X-Requested-With': 'XMLHttpRequest' }"
                        :on-success="handleSuccess" :on-error="handleError" :format="['jpg', 'jpeg', 'png']"
                        :on-format-error="handleFormatError" action="/api/admin/uploadInventory">
                        <div style="padding: 3px 0">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                            <p>Click or drag files here to upload</p>
                        </div>
                    </Upload>
                    <div v-if="formValidate.image" class="demo-upload-list">
                        <Image :src="`/inventory/low/${formValidate.image}`" fit="cover" width="100%" height="100%" />
                        <div class="demo-upload-list-cover">
                            <Icon type="ios-eye-outline" @click="handleView(item.name)"></Icon>
                            <Icon type="ios-trash-outline" @click="deleteImage()"></Icon>
                        </div>
                    </div>
                </FormItem>

                <div class="w-full border flex justify-center bg-[#abdcff]/80 py-1 mb-2">
                    <p class="">Hard Coastal Structure</p>
                </div>

                <FormItem label="CoastalID" prop="coastalID">
                    <Input v-model="formValidate.coastalID" placeholder="Input Coastal Identification"></Input>
                </FormItem>
                <FormItem label="Province" prop="province">
                    <Input v-model="formValidate.province" placeholder="Input Province"></Input>
                </FormItem>
                <FormItem label="Coastal Protection" prop="coastalProtection">
                    <Input v-model="formValidate.coastalProtection" placeholder="Input Coastal Protection"></Input>
                </FormItem>
                <FormItem label="Latitude" prop="latitude">
                    <Input v-model="formValidate.latitude" placeholder="Input Latitude"></Input>
                </FormItem>
                <FormItem label="Longitude" prop="longitude">
                    <Input v-model="formValidate.longitude" placeholder="Input Longitude"></Input>
                </FormItem>
                <FormItem label="Location Type" prop="locationType">
                    <Input v-model="formValidate.locationType" placeholder="Input Location Type"></Input>
                </FormItem>
                <FormItem label="Estimated Yr. of Completed" prop="yearCompleted">
                    <Input v-model="formValidate.yearCompleted" placeholder="Input Estimated Yr. of Completed"></Input>
                </FormItem>

                <div class="w-full border flex justify-center bg-[#abdcff]/80 py-1 mb-2">
                    <p class="">Structure Details</p>
                </div>

                <FormItem label="Length (m)" prop="length">
                    <Input v-model="formValidate.length" placeholder="Input Length (m)"></Input>
                </FormItem>
                <FormItem label="Height Range" prop="heightRange">
                    <Input v-model="formValidate.heightRange" placeholder="Input Height Range"></Input>
                </FormItem>
                <FormItem label="Primary Material" prop="primaryMaterial">
                    <Input v-model="formValidate.primaryMaterial" placeholder="Input Primary Material"></Input>
                </FormItem>

                <div class="w-full border flex justify-center bg-[#abdcff]/80 py-1 mb-2">
                    <p class="">Asset Condition</p>
                </div>

                <FormItem label="Condition Rating" prop="conditionRating">
                    <Input v-model="formValidate.conditionRating" placeholder="Input Condition Rating"></Input>
                </FormItem>

                <FormItem label="Condition Rating Description" prop="crDesc">
                    <ckeditor :editor="editor" v-model="formValidate.crDesc" :config="editorConfig"
                        placeholder="Condition Rating Description Here"></ckeditor>
                </FormItem>

                <FormItem label="Priority Rating" prop="priorityRating">
                    <Input v-model="formValidate.priorityRating" placeholder="Input Priority Rating"></Input>
                </FormItem>

                <FormItem label="Priority Rating Description" prop="prDesc">
                    <ckeditor :editor="editor" v-model="formValidate.prDesc" :config="editorConfig"
                        placeholder="Priority Rating Description Here"></ckeditor>
                </FormItem>

                <div class="flex justify-end">
                    <a-button key="submit" type="primary" @click="handleSubmit('formValidate')">Submit</a-button>
                </div>
            </Form>
        </div>
    </div>
</template>

<script>
import { defineComponent, ref, watch } from 'vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { notification } from 'ant-design-vue';
export default defineComponent({
    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic',
                        '|', 'link', 'blockQuote',
                        '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
                    ]
                }
            },
            token: '',

            formValidate: {
                image: '',
                coastalID: '',
                province: '',
                coastalProtection: '',
                latitude: '',
                longitude: '',
                locationType: '',
                yearCompleted: '',
                length: '',
                heightRange: '',
                primaryMaterial: '',
                conditionRating: '',
                crDesc: '',
                priorityRating: '',
                prDesc: '',
            },
            ruleValidate: {
                image: [
                    { required: true, message: 'The image cannot be empty', trigger: 'blur' }
                ],
                coastalID: [
                    { required: true, message: 'The coastalID cannot be empty', trigger: 'blur' }
                ],
                province: [
                    { required: true, message: 'The province cannot be empty', trigger: 'blur' }
                ],
                coastalProtection: [
                    { required: true, message: 'The coastal protection cannot be empty', trigger: 'blur' }
                ],
                latitude: [
                    { required: true, message: 'The latitude cannot be empty', trigger: 'blur' }
                ],
                longitude: [
                    { required: true, message: 'The longitude cannot be empty', trigger: 'blur' }
                ],
                locationType: [
                    { required: true, message: 'The location type cannot be empty', trigger: 'blur' }
                ],
                yearCompleted: [
                    { required: true, message: 'The Estimated Yr. of Completed cannot be empty', trigger: 'blur' }
                ],
                length: [
                    { required: true, message: 'The length cannot be empty', trigger: 'blur' }
                ],
                heightRange: [
                    { required: true, message: 'The height range cannot be empty', trigger: 'blur' }
                ],
                primaryMaterial: [
                    { required: true, message: 'The primary material cannot be empty', trigger: 'blur' }
                ],
                conditionRating: [
                    { required: true, message: 'The condition rating cannot be empty', trigger: 'blur' }
                ],
                crDesc: [
                    { required: true, message: 'The codition rating description cannot be empty', trigger: 'blur' }
                ],
                priorityRating: [
                    { required: true, message: 'The priority rating cannot be empty', trigger: 'blur' }
                ],
                prDesc: [
                    { required: true, message: 'The priority rating description cannot be empty', trigger: 'blur' }
                ]
            },
        }
    },
    methods: {
        handleSubmit(name) {
            let existingObj = this;
            this.$refs[name].validate((valid) => {
                if (valid) {
                    axios.get('/sanctum/csrf-cookie').then(response => {
                        axios.post(`/api/admin/storeInventory`, this.formValidate)
                            .then(function (response) {
                                console.log(response.data);
                                notification.success({
                                    message: 'Notification',
                                    description: 'New Inventory is Successfully Created',
                                });
                                existingObj.$router.push('/admin/inventoryPlatform');
                            })
                            .catch(function (error) {

                            });
                    })
                    console.log(this.formValidate);

                } else {
                }
            })
        },
        handleSuccess(res, file) {
            this.formValidate.image = res
        },
        handleError(res, file) {
            console.log('res', res);
        },
        handleFormatError(file) {
            notification.warning({
                message: 'The file format is incorrect',
                description: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
            });
        },
        async deleteImage() {
            let image = this.formValidate.image
            this.formValidate.image = ''
            this.$refs.uploads.clearFiles()
            await axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post(`/api/admin/deleteImageInventory`, { imageName: image })
                    .then(function (response) {
                    })
                    .catch(function (error) {
                        if (error) {
                            this.formValidate.image = image
                        }
                    });
            })
        },
    },
    created() {
        this.token = window.Laravel.csrfToken;
    }
})
</script>