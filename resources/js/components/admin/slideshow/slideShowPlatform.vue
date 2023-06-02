<template>
    <div class="p-2">
        <div class="m-5 bg-white shadow-inner shadow-lg rounded py-5">
            <div class="flex justify-center text-2xl">
                Slides Management
            </div>
            <div class="w-full mt-5">
                <swiper 
                    :pagination="true" 
                    :loop="true"    
                    :autoplay="{
                        delay: 3500,
                        disableOnInteraction: false,
                    }" 
                    :mousewheel="false"
                    :modules="modules" class="mySwiper"
                >
                    <swiper-slide>
                        <img src="/img/field1.jpg" class="object-cover w-full lg:h-[30rem]" alt="#">       
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/img/field1.jpg" class="object-cover w-full lg:h-[30rem]" alt="#">       
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/img/field1.jpg" class="object-cover w-full lg:h-[30rem]" alt="#">       
                    </swiper-slide>
                    <swiper-slide>
                        <img src="/img/field1.jpg" class="object-cover w-full lg:h-[30rem]" alt="#">       
                    </swiper-slide>
                </swiper>
            </div>
            <div class="mt-5">
                <div class="demo-upload-list" v-for="item in uploadList">
                    <template v-if="item.status === 'finished'">
                        <Image :src="item.url" fit="cover" width="100%" height="100%" />
                        <div class="demo-upload-list-cover flex items-center">
                            <Icon type="ios-eye-outline" @click="handleView(item.name)"></Icon>
                            <Icon type="ios-trash-outline" @click="handleRemove(item)"></Icon>
                        </div>
                    </template>
                    <template v-else>
                        <Progress v-if="item.showProgress" :percent="item.percentage" hide-info></Progress>
                    </template>
                </div>
                <Upload
                    ref="upload"
                    :show-upload-list="false"
                    :default-file-list="defaultList"
                    :on-success="handleSuccess"
                    :format="['jpg','jpeg','png']"
                    :max-size="2048"
                    :on-format-error="handleFormatError"
                    :on-exceeded-size="handleMaxSize"
                    :before-upload="handleBeforeUpload"
                    multiple
                    type="drag"
                    action="//jsonplaceholder.typicode.com/posts/"
                    style="display: inline-block;width:100px;">
                    <div style="width: 100px;height:100px;line-height: 100px;">
                        <Icon type="ios-camera" size="20"></Icon>
                    </div>
                </Upload>
                <ImagePreview v-model="visible" :preview-list="['https://file.iviewui.com/images/' + imgName]" />
            </div>
        </div>
    </div>
</template>

<script>

import { defineComponent, ref } from 'vue';
import { PlusOutlined } from '@ant-design/icons-vue';
import { Swiper, SwiperSlide } from "swiper/vue";
import { Mousewheel, Autoplay, Pagination, Navigation } from "swiper";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";


export default defineComponent({
    components: {
        PlusOutlined,
        Swiper,
        SwiperSlide,
    },
    data () {
        return {
            defaultList: [
                {
                    'name': 'image-demo-1.jpg',
                    'url': 'https://file.iviewui.com/images/image-demo-1.jpg'
                },
                {
                    'name': 'image-demo-2.jpg',
                    'url': 'https://file.iviewui.com/images/image-demo-2.jpg'
                }
            ],
            imgName: '',
            visible: false,
            uploadList: []
        }
    },
    setup() {

        return {
            modules: [Mousewheel, Autoplay, Pagination, Navigation],

        };
    },
    methods: {
        handleView (name) {
            this.imgName = name;
            this.visible = true;
        },
        handleRemove (file) {
            const fileList = this.$refs.upload.fileList;
            this.$refs.upload.fileList.splice(fileList.indexOf(file), 1);
        },
        handleSuccess (res, file) {
            file.url = 'https://file.iviewui.com/images/image-demo-3.jpg';
            file.name = 'image-demo-3.jpg';
        },
        handleFormatError (file) {
            this.$Notice.warning({
                title: 'The file format is incorrect',
                desc: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
            });
        },
        handleMaxSize (file) {
            this.$Notice.warning({
                title: 'Exceeding file size limit',
                desc: 'File  ' + file.name + ' is too large, no more than 2M.'
            });
        },
        handleBeforeUpload () {
            const check = this.uploadList.length < 5;
            if (!check) {
                this.$Notice.warning({
                    title: 'Up to five pictures can be uploaded.'
                });
            }
            return check;
        }
    },
    mounted () {
        this.uploadList = this.$refs.upload.fileList;
    }
});    
</script>

<style scoped>
/* you can make up upload button and sample style by using stylesheets */
.demo-upload-list{
    display: inline-block;
    width: 100px;
    height: 100px;
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

</style>