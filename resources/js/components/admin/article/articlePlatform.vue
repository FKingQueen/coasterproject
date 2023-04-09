<template>
  <div class="m-5 bg-white shadow-inner shadow rounded p-10">
    <a-button type="primary" @click="showModalCreate">Open Modal of 1000px width</a-button>
    <a-modal v-model:visible="visible" width="1000px" title="Basic Modal" @ok="handleOk">
      <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="95">
        <FormItem label="Image" prop="image">
          <Upload v-model="formValidate.image" action="//jsonplaceholder.typicode.com/posts/">
              <Button icon="ios-cloud-upload-outline">Upload files</Button>
          </Upload>
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
        <FormItem>
            <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
        </FormItem>
      </Form>
    </a-modal>
    <Table border :columns="columns" :data="data">
        <template #name="{ row }">
            <strong>{{ row.name }}</strong>
        </template>
        <template #action="{ row, index }">
            <Button type="primary" size="small" style="margin-right: 5px" @click="show(index)">View</Button>
            <Button type="error" size="small" @click="remove(index)">Delete</Button>
        </template>
    </Table>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue';

export default defineComponent({
  data() {
    const visible = ref(false);
    const showModalCreate = () => {
      visible.value = true;
    };
    const handleOk = e => {
      console.log(e);
      visible.value = false;
    };
    
    return {
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
            title: 'Name',
            slot: 'name'
        },
        {
            title: 'Age',
            key: 'age'
        },
        {
            title: 'Address',
            key: 'address'
        },
        {
            title: 'Action',
            slot: 'action',
            width: 150,
            align: 'center'
        }
      ],
      data: [
        {
            name: 'John Brown',
            age: 18,
            address: 'New York No. 1 Lake Park'
        },
        {
            name: 'Jim Green',
            age: 24,
            address: 'London No. 1 Lake Park'
        },
        {
            name: 'Joe Black',
            age: 30,
            address: 'Sydney No. 1 Lake Park'
        },
        {
            name: 'Jon Snow',
            age: 26,
            address: 'Ottawa No. 2 Lake Park'
        }
      ]
    }
  },
  methods: {
    show (index) {
      this.$Modal.info({
        title: 'User Info',
        content: `Name：${this.data[index].name}<br>Age：${this.data[index].age}<br>Address：${this.data[index].address}`
      })
    },
    remove (index) {
      this.data.splice(index, 1);
    },
    async handleSubmit (name) {
      this.$refs[name].validate((valid) => {
        if (valid) {
            this.$Message.success('Success!');
            axios.post(`/api/storeArticle`, this.formValidate)
                .then(function (response) {
                console.log(response);
                this.$Message.success('Success!');
                })
                .catch(function (error) {
                console.log(error)
            });
            if(res.status==200){
            console.log(res);
            }
        } else {
            // this.$Message.error('Fail!');
        }
      })
    }
  }
})
</script>

<style scoped>
</style>