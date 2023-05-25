<template>
<div :class="{ 'h-screen': !isLoaded }">
    <div v-if="isLoaded" class="lg:flex lg:px-0 px-2 justify-center lg:space-x-6 space-x-0 py-10">
        <div class="lg:w-5/12 w-full h-full lg:shadow-2xl shadow-lg border">
            <!-- <div v-if="isLoaded" class="flex justify-center">
                <div class="w-full">
                    <p class="text-left text-3xl tracking-wide antialiased border-b-2 border-black/20 mt-4 blur-none">
                        Highlights of Activities
                    </p>
                    <swiper
                        :spaceBetween="30"
                        :loop="true"
                        :pagination="{
                        clickable: true,
                        }"
                        :modules="modules"
                        class="mySwiper h-80 mt-2"
                    >
                        <swiper-slide v-for="(images, key) in this.projectImages" >
                            <img class="object-cover w-full" :src="`/img/${images.name}`">
                        </swiper-slide>
                    </swiper>
                </div>
            </div> -->
        </div>
    </div>
</div>
</template>

<script>
import { defineComponent, ref} from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';   
import { Pagination } from 'swiper';
export default defineComponent({
    components: {
        Swiper,
        SwiperSlide,
    },
    data(){
        return{
            projectImages: [],
            isLoaded: ref(false)
        }
    },
    async mounted(){
        let existingObj = this; 
        let projectjId = this.$route.params.id
        let projectjName = this.$route.params.project
        
        await axios.get(`/api/getProject/${projectjId}`)
        .then(function (response) {
            
            existingObj.projectImages = response.data;
            existingObj.isLoaded = true;
        })
        .catch(function (error) {
            console.log(error)
        });
        console.log(existingObj.projectImages);
    }
})
</script>