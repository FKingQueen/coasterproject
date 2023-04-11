<template>
  <div>
    <div class="px-10 py-5">
      <a-button type="primary" @click="showModalCreate">Open Modal of 1000px width</a-button>
      <a-modal v-model:visible="visible" :maskClosable="false" width="1000px" title="Basic Modal" @ok="handleOk">
        <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="95">
          <FormItem label="Name" prop="name">
              <Input v-model="formValidate.name" placeholder="Enter your name"></Input>
          </FormItem>
          <FormItem label="E-mail" prop="email">
              <Input v-model="formValidate.email" placeholder="Enter your e-mail"></Input>
          </FormItem>
          <FormItem label="User Type" prop="userType">
              <Select v-model="formValidate.userType" placeholder="Select your User Type">
                  <Option value="1">Admin</Option>
                  <Option value="2">Editor</Option>
              </Select>
          </FormItem>
          <FormItem label="Password" prop="passwd">
            <Input type="password" v-model="formValidate.passwd"></Input>
          </FormItem>
          <FormItem label="Confirm" prop="passwdCheck">
            <Input type="password" v-model="formValidate.passwdCheck"></Input>
          </FormItem>
          <FormItem>
              <Button type="primary" @click="handleSubmit('formValidate')">Submit</Button>
          </FormItem>
        </Form>
      </a-modal>
    </div>
  </div>
</template>
<script>
import { defineComponent, ref } from 'vue';
  export default {
      data () {
        const visible = ref(false);
        const showModalCreate = () => {
          visible.value = true;
        };
        const handleOk = e => {
          console.log(e);
          visible.value = false;
        };
        
        const validatePass = (rule, value, callback) => {
          if (value === '') {
              callback(new Error('Please enter your password'));
          } else {
              if (this.formValidate.passwdCheck !== '') {
                  // 对第二个密码框单独验证
                  this.$refs.formValidate.validateField('passwdCheck');
              }
              callback();
          }
        };
        const validatePassCheck = (rule, value, callback) => {
          if (value === '') {
              callback(new Error('Please enter your password again'));
          } else if (value !== this.formValidate.passwd) {
              callback(new Error('The two input passwords do not match!'));
          } else {
              callback();
          }
        };
        return {
          formValidate: {
              name: '',
              email: '',
              userType: '',
              passwd: '',
              passwdCheck: ''
          },
          ruleValidate: {
              name: [
                  { required: true, message: 'The name cannot be empty', trigger: 'blur' }
              ],
              email: [
                  { required: true, message: 'Mailbox cannot be empty', trigger: 'blur' },
                  { type: 'email', message: 'Incorrect email format', trigger: 'blur' }
              ],
              userType: [
                  { required: true, message: 'Please select the userType', trigger: 'change' }
              ],
              passwd: [
                { validator: validatePass, trigger: 'blur' }
              ],
              passwdCheck: [
                  { validator: validatePassCheck, trigger: 'blur' }
              ]
          },
          visible,
          showModalCreate,
          handleOk,
        }
      },
      methods: {
        handleSubmit (name) {
          this.$refs[name].validate((valid) => {
            if (valid) {
                this.$Message.success('Success!');
                axios.post(`/api/storeUser`, this.formValidate)
                    .then(function (response) {
                    console.log(response);
                    this.$Message.success('Success!');
                    })
                    .catch(function (error) {
                    console.log(error)
                });
            } else {
                this.$Message.error('Fail!');
            }
          })
        },
        handleReset (name) {
            this.$refs[name].resetFields();
        }
          
      }
  }
</script>
