<template>
    <div :class="{ 'h-screen': !isLoaded }" class="">
        <div>
            <div class="w-full flex justify-center">
                <div class="w-2/4">

                </div>
            </div>
            <div v-if="isLoaded" class="lg:flex lg:px-0 px-2 justify-center lg:space-x-6 space-x-0 py-10">
                <div class="lg:w-6/12 w-full h-full ">
                    <h1 class="text-center antialiased blur-none pb-4">
                        More <span class="text-sky-800 ">{{ moreCurrent }}</span>
                    </h1>
                    <div v-for="(more, key) in this.moreArticle_list" class="flex block border-b-2 border-sky-900/60 pb-3 mb-5">
                        <img  class="cursor-pointer bg-sky-200 object-cover object-center blur-none w-24 h-24 " :src="`/uploads/low/${more.image}`">
                        <div class="block w-fit px-1 overflow-hidden">
                            <p class="cursor-pointer text-sm blur-none antialiased font-semibold text-sky-600  truncate">{{ more.title }}</p>
                            <h1 class="text-xs blur-none">{{ moreCurrent }} | {{ more.date }}</h1>
                            <h1 class="blur-none antialiased text-xs text-justify line-clamp-3 leading-relaxed">By {{ more.author }}, {{ more.article }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import { defineComponent, ref} from 'vue';
import { Swiper, SwiperSlide } from "swiper/vue";
import { EffectCoverflow, Pagination } from "swiper";
import "swiper/css";
import "swiper/css/effect-coverflow";
import "swiper/css/pagination";

export default defineComponent({
    components: {
        Swiper,
        SwiperSlide,
    },
    setup(){
        return {
            modules: [EffectCoverflow, Pagination],
        };
    },
    data(){
        return {
            moreArticle: [],
            moreArticle_list: [],
            articles: [],
            moreCurrent: '',
            isLoaded: ref(false)
        }
    },
    methods: {
        getmoreArticle(){
            let existingObj = this;
            const art = []
            if(existingObj.moreArticle.length > 10){
                for(let i = 0; i < 10; i++) {
                art.push(existingObj.moreArticle[i])
                }
                existingObj.moreArticle = existingObj.moreArticle.slice(9, existingObj.moreArticle.length);
                return art;
            } else if(existingObj.moreArticle.length < 10) {
                for(let i = 0; i < existingObj.moreArticle.length; i++) {
                    art.push(existingObj.moreArticle[i])
                }
                existingObj.moreArticle = existingObj.moreArticle.slice(existingObj.moreArticle.length);
                return art;
            } else if(existingObj.moreArticle.length == ""){
                return;
            }
            return;
        },
        handleScroll() {
            let existingObj = this;
            if(window.scrollY + window.innerHeight >= document.body.scrollHeight - 50){
                const new_moreArticle = this.getmoreArticle()
                this.moreArticle_list = [...this.moreArticle_list, ...new_moreArticle]
            }
        }
    },
    async mounted(){
        let existingObj = this;
        let articleName = this.$route.params.article
        let articleId = ''
        
        if(articleName == 'news'){
            articleId = 1;
            existingObj.moreCurrent = 'News'
        } else if(articleName == 'announcements'){
            articleId = 2;
            existingObj.moreCurrent = 'Annoucements'
        } else if(articleName == 'events'){
            articleId = 3;
            existingObj.moreCurrent = 'Event'
        }

        await axios.get(`/api/getmoreArticle/${articleId}`)
        .then(function (response) {
            existingObj.moreArticle = response.data.moreArticle
            existingObj.articles = response.data.articles
            existingObj.isLoaded = true;
        })
        .catch(function (error) {
            console.log(error)
        });
        
        
        window.addEventListener('scroll', this.handleScroll);
        this.moreArticle_list = this.getmoreArticle();
    }
})
</script>