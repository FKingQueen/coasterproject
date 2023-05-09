<template>
    <div class="p-2">
        <Breadcrumb separator=">">
            <BreadcrumbItem to="/admin/articlePlatform">Article Management</BreadcrumbItem>
            <BreadcrumbItem>Edit Article Form</BreadcrumbItem>
        </Breadcrumb>
        <div class="m-5 bg-white shadow-inner shadow-lg rounded px-20 py-5">
            <a-button @click="this.$router.push('/admin/articlePlatform')" class="mb-3">Back</a-button>
            <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="95" class="px-10" >
                <FormItem label="Image" prop="image">
                <Upload
                    type="drag"
                    ref="uploads"
                    :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
                    :on-success="handleSuccess"
                    :on-error="handleError"
                    :format="['jpg','jpeg','png']"
                    :max-size="2048"
                    :on-format-error="handleFormatError"
                    :on-exceeded-size="handleMaxSize"
                    action="/api/admin/upload">
                    <div style="padding: 20px 0">
                        <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                        <p>Click or drag files here to upload</p>
                    </div>
                </Upload>
                <div v-if="formValidate.image" class="demo-upload-list">
                    <Image :src="`/uploads/${formValidate.image}`" fit="cover" width="100%" height="100%" />
                    <div class="demo-upload-list-cover">
                        <Icon type="ios-eye-outline" @click="handleView(item.name)"></Icon>
                        <Icon type="ios-trash-outline" @click="deleteImage"></Icon>
                    </div>
                </div>
                </FormItem>
                <FormItem label="Project" >
                    <!-- <Select v-model="formValidate.projectValue" multiple style="width:100%" placeholder="Select Project" >
                        <Option v-for="item in projectOptions" :value="item.value" :key="item.value">{{ item.label }}</Option>
                    </Select> -->
                    <a-select
                        v-model:value="formValidate.projectValue"
                        mode="multiple"
                        style="width: 100%"
                        placeholder="Please select"
                        :options="projectOptions"
                        @change="handleChange"
                    ></a-select>
                </FormItem>
                <FormItem label="Article Type" prop="typeValue">
                    <!-- <Select v-model="formValidate.typeValue" style="width:100%" placeholder="Select Article Type" >
                        <Option v-for="item in typeOptions" :value="item.value" :key="item.value">{{ item.label }}</Option>
                    </Select> -->
                    <a-select
                        v-model:value="formValidate.typeValue"
                        style="width: 100%"
                        placeholder="Please select"
                        :options="typeOptions"
                        @change="handleChange"
                    ></a-select>
                </FormItem>
                <FormItem label="Title" prop="title">
                    <Input v-model="formValidate.title" placeholder="Enter Title"></Input>
                </FormItem>
                <FormItem label="Author" prop="author">
                    <Input v-model="formValidate.author" placeholder="Enter Author"></Input>
                </FormItem>
                <FormItem label="Article" prop="article">
                    <Input v-model="formValidate.article" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder="Write Article"></Input>
                </FormItem>
                <div class="flex justify-end">
                    <a-button key="submit" type="primary" @click="handleSubmit('formValidate')">Submit</a-button>
                </div>
            </Form>
        </div>
    </div>
  </template>
  
  <script>
  import { UploadOutlined } from '@ant-design/icons-vue';
  import { defineComponent, ref } from 'vue';
  import { notification } from 'ant-design-vue';
  import { useRoute, useRouter} from 'vue-router';
  
  export default defineComponent({
    setup() {
        const projectOptions = ref([{
        value: '1',
        label: 'Project 1 : Coastal Erosion Trends and Management Strategies for Region 1',
        }, {
        value: '2',
        label: 'Project 2 : Assesment Monitoring, and Prediction of Coastal Flooding of Selected Municipalities in Region 1',
        }, {
        value: '3',
        label: 'Project 3 : Development of Science-based Engineering Approach to Coastal Prediction in Region 1',
        }, {
        value: '4',
        label: 'Project 4 : Enhancing Coastal Design and Infrastructure Intervention through the Establishment of Wave Testing Facility',
        }]);
        // watch(projectValue, val => {
        // console.log(`selected:`, val);
        // });

        const typeOptions = ref([{
        value: '1',
        label: 'News',
        }, {
        value: '2',
        label: 'Announcement',
        }, {
        value: '3',
        label: 'Event',
        }]);

        const filterOption = (input, option) => {
        return option.value.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };

        return {
            projectOptions,
            filterOption,
            typeOptions,
        };
    },
    data(){
        return{
            formValidate: {
                image: '',
                projectValue: ref([]),
                typeValue: ref([]),
                token: '',
                title: '',
                author: '',
                article: ''
            },
            ruleValidate: {
                image: [
                    { required: true, message: 'The image cannot be empty', trigger: 'blur' }
                ],
                title: [
                    { required: true, message: 'The author cannot be empty', trigger: 'blur' }
                ],
                author: [
                    { required: true, message: 'The title section cannot be empty', trigger: 'blur' }
                ],
                article: [
                    { required: true, message: 'The article section cannot be empty', trigger: 'blur' },
                    // { type: 'string', min: 20, message: 'Introduce no less than 20 words', trigger: 'blur' }
                ]
            },
        }
    },
    methods: {
        async handleSubmit (name) {
            let existingObj = this;
            this.$refs[name].validate((valid) => {
                if (valid) {
                    // Post
                    // console.log(existingObj.formValidate);

                    // return;
                    axios.post(`/api/admin/updateArticle`, this.formValidate)
                    .then(function (response) {
                        notification.success({
                            message: 'Notification',
                            description: 'The Article is Successfully Updated',
                        });
                        existingObj.$router.push('/admin/articlePlatform');
                    })
                    .catch(function (error) {

                    });

                } else {
                }
            })
            
        },
        async deleteImage(){
            let image = this.formValidate.image
            this.formValidate.image = ''
            this.$refs.uploads.clearFiles()
            await axios.post(`/api/admin/deleteImage`, {imageName: image})
                .then(function (response) {
                

                })
                .catch(function (error) {
                if(error){
                    this.formValidate.image = image
                }
            });       
        },
        handleSuccess (res, file) {
            this.formValidate.image = res
        },
        handleError (res, file) {
            console.log('res', res);
        },
        handleFormatError (file) {
            notification.warning({
                message: 'The file format is incorrect',
                description: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
            });
        },
        handleMaxSize (file) {
            notification.warning({
                message: 'Exceeding file size limit',
                description: 'File  ' + file.name + ' is too large, no more than 2M.'
            });
        },
    },
    async created(){
        this.token = window.Laravel.csrfToken;
        // console.log(this.$route.params.id);
        let id = this.$route.params.id
        let existingObj = this;
        await axios.get(`/api/admin/getArticleEdit/${id}`)
        .then(function (response) {
            // console.log(response.data[0].type);
            existingObj.formValidate.id = response.data[0].id
            existingObj.formValidate.title = response.data[0].title
            existingObj.formValidate.image = response.data[0].image
            existingObj.formValidate.author = response.data[0].author
            existingObj.formValidate.article = response.data[0].article

            for(let i = 0; i < response.data[0].projects.length; i++ ){
                existingObj.formValidate.projectValue.push(response.data[0].projects[i].projectType_id.toString());
            }
            existingObj.formValidate.typeValue.push(response.data[0].type_id.toString());
            // console.log(existingObj.formValidate.projectValue);
            
        })
        .catch(function (error) {
            console.log(error)
        });
    }
  })
  </script>
  
  <style>

  </style>