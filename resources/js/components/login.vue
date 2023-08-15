<template>
    <div class="flex justify-center h-screen w-screen items-center">
        <div class="w-full flex flex-col items-center">
            <div class="md:w-1/4 w-11/12 border px-2 pt-5 shadow">
                <div>
                    <h1 class="text-center text-2xl font-bold text-gray-600 mb-6">COASTER WEB PORTAL</h1>
                </div>
                <a-form :model="this.formState" name="normal_login" v-bind="layout" class="login-form" @finish="login"
                    :validate-messages="validateMessages">
                    <a-form-item label="Email" name="email" :rules="[{ type: 'email' }]">
                        <a-input v-model:value="this.formState.email">
                            <template #prefix>
                                <UserOutlined class="site-form-item-icon" />
                            </template>
                        </a-input>
                    </a-form-item>

                    <a-form-item label="Password" name="password" :rules="[{ type: 'string', min: 8 }]">
                        <a-input-password v-model:value="this.formState.password">
                            <template #prefix>
                                <LockOutlined class="site-form-item-icon" />
                            </template>
                        </a-input-password>
                    </a-form-item>

                    <a-form-item>
                        <div class="flex justify-between">
                            <a class="login-form-forgot" href="">Forgot password</a>
                            <a-button :disabled="disabled" type="primary" html-type="submit" class="login-form-button">
                                Login
                            </a-button>
                        </div>
                    </a-form-item>
                </a-form>
            </div>
        </div>
    </div>
</template>
<script>
import { defineComponent, reactive, computed } from 'vue';
import { UserOutlined, LockOutlined } from '@ant-design/icons-vue';
import { notification } from 'ant-design-vue';
import { nextTick } from 'process';
export default defineComponent({
    computed: {
        user: {
            get() {
                return this.$store.state.currentUser.user;
            }
        }
    },
    components: {
        UserOutlined,
        LockOutlined,
    },
    data() {
        const layout = {
            labelCol: {
                span: 5,
            }
        };
        const disabled = computed(() => {
            return !(this.formState.email && this.formState.password);
        });
        const validateMessages = {
            required: '${label} is required!',
            types: {
                email: '${label} is not a valid email!',
            },
            string: {
                range: '${label} must be between ${min} characters',
            },
        };
        return {
            isLoggedIn: false,
            formState: {
                email: '',
                password: ''
            },
            validateMessages,
            layout,
            disabled,
            prevRoute: null
        }
    },
    methods: {
        async login() {
            let existingObj = this;
            await axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('api/login', this.formState)
                    .then(response => {
                        if (response.data.auth == "success") {
                            notification.success({
                                message: 'Notification',
                                description: 'You are Logged In',
                            });
                        } else if (response.data.auth == "failed") {
                            notification.error({
                                message: 'Notification',
                                description: 'Incorrect Login Details',
                            });
                            return;
                        }
                        window.Laravel.isLoggedin = true
                        window.Laravel.role_id = response.data.role_id

                        this.$router.push({ path: '/admin/articlePlatform' })
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        let existingObj = this;
        if (window.Laravel.isLoggedin) {
            next({ path: '/admin/articlePlatform' })
        } else {
            next();
        }
    }

});
</script>
