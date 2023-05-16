<template>
    <div :class="{ 'h-screen': !isLoaded }">
        <div v-if="isLoaded" class="lg:flex lg:px-0 px-2 justify-center lg:space-x-6 space-x-0 py-10">
            <div class="lg:w-5/12 w-full h-full lg:shadow-2xl shadow-lg border">
                <img class="object-cover w-full" :src="`/uploads/high/${this.article.image}`">
                <div class="p-10 grid grid-cols-1 divide-y divide-sky-400">
                    <div >
                        <h1 class="text-left blur-none decoration-sky-500/10 antialiased block">
                            {{ this.article.title }}
                        </h1>
                        <h1 class="text-left blur-none text-xl font-thin text-black/70 antialiased">
                            {{ this.article.date }}
                        </h1>
                        <p class="text-justify blur-none font-medium mt-10 mb-5 tracking-wide antialiased">
                            By {{ this.article.author }}
                        </p>
                        <p class="text-justify blur-none font-medium indent-8 leading-loose tracking-wide antialiased">
                            {{ this.article.article }}
                        </p>
                    </div>
                    <div class="mt-5">
                        <h1 class="text-xl mt-3 blur-none text-black/80 antialiased">
                            Gallery
                        </h1>
                        <a-image
                            style="height: 70px"
                            :src="`/uploads/low/${this.article.image}`"
                            :preview="{
                                src: `/uploads/high/${this.article.image}`,
                            }"
                        />
                    </div>
                </div>
            </div>
            <div class="lg:w-2/12 h-full lg=mt-0 mt-14">
                <h1 class="text-center text-2xl border-b-2 border-sky-800/40 blur-none antialiased text-sky-800/90">
                    Other {{ otherCurrent }}
                </h1>
                <div v-for="(other, key) in this.others.slice(0,5)" class="py-2 drop-shadow-2xl">
                    <div class="h-32 shadow-lg" :style="{backgroundImage:`url(/uploads/low/${other.image})`}" style="background-repeat: no-repeat; background-size: cover; ">  
                        <div @click="gotoArticle(other)" class="cursor-pointer flex items-end w-full h-full bg-[#0d2247]/60">
                            <div class="px-2 w-full">
                                <h1 class="text-white/80 text-sm p-0 font-thin blur-none antialiased  ">
                                    {{ other.date }}
                                </h1>
                                <h1 class="text-white/80 p-0 text-base font-thin blur-none antialiased ">
                                    {{ other.title }}
                                </h1>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { defineComponent, ref} from 'vue';
export default defineComponent({
    data(){
        return{
            article: {
                id: '',
                title: '',
                image: '',
                date: '',
                author: '',
                article: '',
                projects: '',
                type: ''
            },
            articles: '',
            events: [],
            news: [],
            announcements: [],
            others: [],
            otherCurrent: '',
            isLoaded: ref(false)
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
        }
    },
    async created(){
        let id = this.$route.params.id
        let existingObj = this;
        await axios.get(`/api/getArticle/${id}`)
        .then(function (response) {
            existingObj.articles = response.data.articles
            existingObj.article.id = response.data.article[0].id
            existingObj.article.title = response.data.article[0].title
            existingObj.article.image = response.data.article[0].image
            existingObj.article.date = response.data.article[0].date
            existingObj.article.author = response.data.article[0].author
            existingObj.article.article = response.data.article[0].article
            existingObj.article.projects = response.data.article[0].projects
            existingObj.article.type = response.data.article[0].type
            for(let k = 1; k <= 3; k++  ){
                if(existingObj.article.type.id == k){
                    for(let i = 0; i < existingObj.articles.length; i++){
                        if(existingObj.articles[i].type_id == k && existingObj.article.id != existingObj.articles[i].id){
                            existingObj.others.push(existingObj.articles[i]);
                        } 
                    }
                }
            }

            if(existingObj.article.type.id == 1){
                existingObj.otherCurrent = 'News'
            } else if(existingObj.article.type.id == 2){
                existingObj.otherCurrent = 'Announcements'
            } else if(existingObj.article.type.id == 3){
                existingObj.otherCurrent = 'Events'
            }
            existingObj.isLoaded = true;
        })
        .catch(function (error) {
            console.log(error)
        });
    }
});
</script>

<style scoped>
    .sh{
        height: 100%;
    }
</style>
