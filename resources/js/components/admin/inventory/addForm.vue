<template>
    <div class="p-2 ">
        <div class="m-5 bg-white shadow-inner shadow-lg rounded px-20 py-5">
            <Breadcrumb separator=">">
                <BreadcrumbItem to="/admin/articlePlatform">Inventory</BreadcrumbItem>
                <BreadcrumbItem>New Inventory Form</BreadcrumbItem>
            </Breadcrumb>
            <a-button @click="this.$router.push('/admin/articlePlatform')" class="my-3">Back</a-button>
            <Form ref="formValidate" :model="formValidate" :rules="ruleValidate" :label-width="100" class="px-10" >
                <FormItem label="Province" prop="province">
                    <Select v-model="formValidate.province" clearable placeholder="Select Municipality" >
                        <Option v-for="item in provinceList" :value="item.value" :key="item.value">{{ item.label }}</Option>
                    </Select>
                </FormItem>

                <FormItem label="Municipality" prop="municipality">
                    <Input v-model="formValidate.municipality" placeholder="Enter Municipality"></Input>
                </FormItem>
                <FormItem label="Barangay" prop="barangay">
                    <Input v-model="formValidate.barangay" placeholder="Enter Barangay"></Input>
                </FormItem>
                <FormItem label="Latitude" prop="latitude">
                    <Input v-model="formValidate.latitude" placeholder="Enter Latitude"></Input>
                </FormItem>
                <FormItem label="Longitude" prop="longitude">
                    <Input v-model="formValidate.longitude" placeholder="Enter Longitude"></Input>
                </FormItem>
                <div class="flex justify-end">
                    <a-button key="submit" type="primary" @click="handleSubmit('formValidate')">Submit</a-button>
                </div>
            </Form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            provinceList: [
                {
                    value: 'Ilocos Norte',
                    label: 'Ilocos Norte'
                },
                {
                    value: 'Ilocos Sur',
                    label: 'Ilocos Sur'
                },
                {
                    value: 'La Union',
                    label: 'La Union'
                },
                {
                    value: 'Pangasinan',
                    label: 'Pangasinan'
                },
            ],
            formValidate: {
                province: '',
                municipality: '',
                barangay: '',
                latitude: '',
                longitude: '',
            },
            ruleValidate: {
                province: [
                    { required: true, message: 'The province cannot be empty', trigger: 'blur' }
                ],
                municipality: [
                    { required: true, message: 'The municipality cannot be empty', trigger: 'blur' }
                ],
                barangay: [
                    { required: true, message: 'The barangay cannot be empty', trigger: 'blur' }
                ],
                latitude: [
                    { required: true, message: 'The latitude cannot be empty', trigger: 'blur' }
                ],
                longitude: [
                    { required: true, message: 'The longitude cannot be empty', trigger: 'blur' }
                ],
            },
        }
    },
    methods: {
        handleSubmit(name){
            let existingObj = this;
            this.$refs[name].validate((valid) => {
                if (valid) {
                    axios.get('/sanctum/csrf-cookie').then(response => {
                        axios.post(`/api/admin/storeInventory`, this.formValidate)
                        .then(function (response) {
                            console.log(response.data);
                            notification.success({
                                message: 'Notification',
                                description: 'New Article is Successfully Created',
                            });
                        })
                        .catch(function (error) {

                        });
                    })
                    console.log(this.formValidate);

                } else {
                }
            })
        }
    }
}
</script>