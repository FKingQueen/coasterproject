<template>
  <div class="m-5 bg-white shadow-inner shadow rounded p-10">
    <a-button @click="showModalCreate" class="mb-2">New Article</a-button>
    <a-modal v-model:visible="visible" width="1000px" :maskClosable="false" title="Creating New Article" >
      <template #footer>
        <a-button key="back" @click="handleOk">Return</a-button>
        <a-button key="submit" type="primary" :loading="loading" @click="handleSubmit('formValidate')">Submit</a-button>
      </template>
      <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="95">
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
            action="/api/upload">
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
        <FormItem label="Title" prop="title">
            <Input v-model="formValidate.title" placeholder="Enter Title"></Input>
        </FormItem>
        <FormItem label="Author" prop="author">
            <Input v-model="formValidate.author" placeholder="Enter Author"></Input>
        </FormItem>
        <FormItem label="Article" prop="article">
            <Input v-model="formValidate.article" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder="Write Article"></Input>
        </FormItem>
      </Form>
    </a-modal>
    <Table border :columns="columns" :data="articles" ref="table">
        <template #name="{ row }">
            <strong>{{ row.title }}</strong>
        </template>
        <template #action="{ row, index }">
            <Button type="primary" size="small" style="margin-right: 5px" @click="show(index)">View</Button>
            <Button type="error" size="small" @click="remove(index)">Delete</Button>
        </template>
    </Table>
  </div>
</template>

<script>
import { UploadOutlined } from '@ant-design/icons-vue';
import { notification } from 'ant-design-vue';
import { defineComponent, ref } from 'vue';

export default defineComponent({
  components: {
    UploadOutlined,
  },
  data() {
    const fileList = ref([]);
    const visible = ref(false);
    const showModalCreate = () => {
      visible.value = true;
    };
    const handleOk = e => {
      // console.log(e);
      visible.value = false;
    };
    
    return {
      articles: [],
      token: '',
      status: '',
      img: '',
      imgPreview: null,
      fileList,
      visible,
      showModalCreate,
      handleOk,
      formValidate: {
        image: '',
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
      columns: [
        {
            title: 'Title',
            key: 'title'
        },
        {
            title: 'Author',
            key: 'author'
        },
        {
            title: 'Image',
            key: 'image'
        },
        {
            title: 'Article',
            key: 'article'
        },
        {
            title: 'Action',
            slot: 'action',
            width: 150,
            align: 'center'
        }
      ]
    }
  },
  methods: {
    async handleSubmit (name) {
      let existingObj = this;
      this.$refs[name].validate((valid) => {
        if (valid) {
            // Post
            axios.post(`/api/storeArticle`, this.formValidate)
              .then(function (response) {
                console.log(response);
                notification.success({
                  message: 'Notification',
                  description: 'New Article is Successfully Created',
                });
                existingObj.visible = false;
                existingObj.articles.push = {
                  author: existingObj.formValidate.author,
                  title: existingObj.formValidate.title,
                  image: existingObj.formValidate.image,
                  article: existingObj.formValidate.article
                }
                existingObj.formValidate.title = '';
                existingObj.formValidate.image = '';
                existingObj.formValidate.author = '';
                existingObj.formValidate.article = '';
                existingObj.$refs.uploads.clearFiles();
                console.log(existingObj.articles);
                this.$refs.table.refresh();           
              })
              .catch(function (error) {

            });

        } else {
            // this.$Message.error('Fail!');
        }
      })
      
    },
    async deleteImage(){
      let image = this.formValidate.image
      this.formValidate.image = ''
      this.$refs.uploads.clearFiles()
      await axios.post(`/api/deleteImage`, {imageName: image})
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
    show (index) {
      this.$Modal.info({
        title: 'User Info',
        content: `Name：${this.data[index].name}<br>Age：${this.data[index].age}<br>Address：${this.data[index].address}`
      })
    },
    remove (index) {
      this.data.splice(index, 1);
    },
  },

  async created(){
    let existingObj = this;
    this.token = window.Laravel.csrfToken;
    await axios.get('/api/getArticle')
    .then(function (response) {
      existingObj.articles = response.data
    })
    .catch(function (error) {
        if(error){
          this.formValidate.image = image
        }
    });
  }
  
})

</script>

<style>
    .demo-upload-list{
        display: inline-block;
        width: 60px;
        height: 60px;
        text-align: center;
        line-height: 60px;
        border: 1px solid transparent;
        border-radius: 4px;
        overflow: hidden;
        background: #fff;
        position: relative;
        box-shadow: 0 1px 1px rgba(0,0,0,.2);
        margin-right: 4px;
    }
    .demo-upload-list img{
        width: 100%;
        height: 100%;
    }
    .demo-upload-list-cover{
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,.6);
    }
    .demo-upload-list:hover .demo-upload-list-cover{
        display: block;
    }
    .demo-upload-list-cover i{
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        margin: 0 2px;
    }
</style>