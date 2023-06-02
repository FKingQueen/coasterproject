<template>
<div :class="{ 'h-screen': !isLoaded }">
    <div v-if="isLoaded" class="w-full flex justify-center lg:space-x-6 space-x-0 py-10">
        <div class="lg:w-5/12 md:w-10/12 w-full lg:px-0 px-2 ">
            <div v-if="isLoaded" class="flex justify-center">
                <div class="w-full">
                    <div class=" flex justify-center items-center">
                        <!-- <img src="/img/top.png" class="blur-none antialiased duration-200 blur-none cursor-pointer object-fill h-20" alt="#"> -->
                        <p class="text-center text-4xl tracking-wide antialiased border-b-2 border-sky-800/50 mt-4 blur-none text-sky-900">Project {{ this.project.id }}: {{ this.project.title }}</p>
                    </div>
                    <div class=" pt-5">
                        <p class="text-left text-2xl tracking-wide antialiased mt-4 blur-none text-sky-800/90">Highlights of the Activity</p>
                        <swiper
                            :spaceBetween="30"
                            :loop="true"
                            :autoplay="{
                            delay: 2500,
                            disableOnInteraction: false,
                            }"
                            :pagination="{
                            clickable: true,
                            }"
                            :modules="modules"
                            class="mySwiper h-80 mt-2"
                        >
                            <swiper-slide v-slot="{ isActive }" v-for="(project, key) in this.projectImages" >
                                <div class="h-full shadow-lg " :style="{backgroundImage:`url(/img/Project${project.project_type_id}/${project.name})`}" style="background-repeat: no-repeat; background-size: cover; ">
                                    <Transition :duration="550" name="nested">
                                            <div v-if="isActive || key == 0 " class="h-full w-full grid content-end  py-6">
                                                <div class="bg-black/50 p-3">
                                                    <p class="font-sans text-lg font-medium tracking-wide antialiased blur-none text-white">
                                                        {{ project.details }}
                                                    </p>
                                                </div>
                                            </div>
                                    </Transition>
                                </div>
                            </swiper-slide>
                        </swiper>

                    </div>

                    <div>
                        <p class="text-left text-2xl tracking-wide antialiased mt-4 blur-none text-sky-800/90">Objective</p>
                        <p v-for="(project, key) in this.projectObjectives" class="text-justify indent-8 text-sm tracking-wide antialiased mt-4 blur-none">
                            {{ key+1 }}. {{ project.objective }}
                        </p>
                    </div>
                    <div>
                        <p class="text-left text-2xl tracking-wide antialiased mt-4 blur-none text-sky-800/90">About</p>
                        <p class="text-justify indent-8 text-sm tracking-wide antialiased mt-4 blur-none leading-loose">
                            {{ this.project.about }}
                        </p>
                    </div>
                    <div class="grid grid-cols-1 divide-y-2 divide-sky-800/70 pt-5">
                        <div>

                        </div>
                        <div>

                        </div>
                    </div>
                    <div>
                        <p class="text-left text-2xl tracking-wide antialiased mt-4 blur-none text-sky-800/90">Gallery</p>
                        <div class="pt-5">
                            <a-image-preview-group>
                                <a-image class="px-5" v-for="(project, key) in this.projectImages"
                                :width="100"
                                    style="height: 70px"
                                    :src="`/img/Project${project.project_type_id}/${project.name}`"
                                    :preview="{
                                        src: `/img/Project${project.project_type_id}/${project.name}`,
                                    }"
                                />
                            </a-image-preview-group>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-2/12 pt-10 hidden lg:block">
            <div>
                <div class="bg-sky-600/60 border-b-2 border-sky-900 py-2">
                    <p class="text-xl text-center">
                        Related <span class="text-sky-900">News</span>
                    </p>
                </div>
                <div class="border-b-2" v-for="(article, key) in this.newsArticles.slice(0,5)">
                    <p @click="gotoArticle(article)" class="text-sm font-thin tracking-wide text-sky-700 cursor-pointer">{{ article.title }}</p>
                    <p class="text-xs font-thin tracking-wide">News | {{ article.date }}</p>
                </div>
                <p @click="gotoMoreArticle('News')" class="text-center text-lg p-5 cursor-pointer">
                    VIEW MORE
                </p>
            </div>

            <div>
                <div class="bg-sky-600/60 border-b-2 border-sky-900 py-2">
                    <p class="text-xl text-center">
                        Related <span class="text-sky-900">Announcements</span>
                    </p>
                </div>
                <div class="border-b-2" v-for="(article, key) in this.announcementsArticles.slice(0,5)">
                    <p @click="gotoArticle(article)" class="text-sm font-thin tracking-wide text-sky-700 cursor-pointer">{{ article.title }}</p>
                    <p class="text-xs font-thin tracking-wide"> Announcements | {{ article.date }}</p>
                </div>
                <p @click="gotoMoreArticle('Announcements')" class="text-center text-lg p-5 cursor-pointer">
                    VIEW MORE
                </p>
            </div>

            <div>
                <div class="bg-sky-600/60 border-b-2 border-sky-900 py-2">
                    <p class="text-xl text-center">
                        Related <span class="text-sky-900">Events</span>
                    </p>
                </div>
                <div class="border-b-2" v-for="(article, key) in this.eventsArticles.slice(0,5)">
                    <p @click="gotoArticle(article)" class="text-sm font-thin tracking-wide text-sky-700 cursor-pointer">{{ article.title }}</p>
                    <p class="text-xs font-thin tracking-wide"> Events | {{ article.date }}</p>
                </div>
                <p @click="gotoMoreArticle('Events')" class="text-center text-lg p-5 cursor-pointer">
                    VIEW MORE
                </p>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { defineComponent, ref} from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';   
import 'swiper/css/navigation';
import { Autoplay, Pagination, Navigation } from 'swiper';
export default defineComponent({
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return{
            projectImages: [],
            projectObjectives: [],
            project: [],
            newsArticles: [],
            announcementsArticles: [],
            eventsArticles: [],
            isLoaded: ref(false)
        }
    },
    setup() {
        return{
            modules: [Autoplay, Pagination, Navigation],
        }
    },
    methods: {
        gotoArticle(article){
            const id = article.id
            const title = article.title
            if(article.type_id == 1){
                article = 'news'
            } else if(article.type_id == 2){
                article = 'announcements'
            } else if(article.type_id == 3){
                article = 'events'
            }
            this.$router.push({ name: 'article', params: { article, title, id } })
        },
        gotoMoreArticle(article){
            this.$router.push({ name: 'moreArticle', params: { article } })
        },
    },
    async mounted(){
        let existingObj = this; 
        let projectjId = this.$route.params.id
        // let projectjName = this.$route.params.project
        console.log();
        await axios.get(`/api/getProject/${projectjId}`)
        .then(function (response) {
            existingObj.projectImages = response.data.project[0].project_image;
            existingObj.projectObjectives = response.data.project[0].project_objective;
            existingObj.project = response.data.project[0];
            for(let i = 0; i < response.data.newsArticles.length; i++ ){
                if(response.data.newsArticles[i].type.id == 1){
                    existingObj.newsArticles.push(response.data.newsArticles[i]);
                }
            }
            for(let i = 0; i < response.data.announcementsArticles.length; i++ ){
                if(response.data.announcementsArticles[i].type.id == 2){
                    existingObj.announcementsArticles.push(response.data.announcementsArticles[i]);
                }
            }
            for(let i = 0; i < response.data.eventsArticles.length; i++ ){
                if(response.data.eventsArticles[i].type.id == 3){
                    existingObj.eventsArticles.push(response.data.eventsArticles[i]);
                }
            }
            existingObj.isLoaded = true;
        })
        .catch(function (error) {
            console.log(error)
        });
        
        
    }
})
</script>


<style  scoped>
    .nested-enter-active, .nested-leave-active {
        transition: all .6s ease-in-out;
    }
    /* delay leave of parent element */
    .nested-leave-active {
    transition-delay: 0.25s;
    }

    .nested-enter-from,
    .nested-leave-to {
    transform: translateY(30px);
    opacity: 0;
    }

    /* we can also transition nested elements using nested selectors */
    .nested-enter-active .inner,
    .nested-leave-active .inner { 
    transition: all 0.3s ease-in-out;
    }
    /* delay enter of nested element */
    .nested-enter-active .inner {
        transition-delay: 0.25s;
    }

    .nested-enter-from .inner,
    .nested-leave-to .inner {
    transform: translateX(30px);
    /*
        Hack around a Chrome 96 bug in handling nested opacity transitions.
        This is not needed in  browsers or Chrome 99+ where the bug
        has been fixed.
    */
    opacity: 0.001;
    }

</style>