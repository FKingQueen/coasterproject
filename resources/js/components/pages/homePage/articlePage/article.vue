<template>
    <div class="flex justify-center space-x-4 py-10">
        <div class="lg:w-5/12 w-full h-full shadow-2xl">
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
        <div class="border w-2/12 h-full">
            <div class="h-40" style="background-repeat: no-repeat; background-size: cover; background-image: url(/img/field1.jpg);">
                
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
        }
    },
    async created(){
        let id = this.$route.params.id
        console.log(id);
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
            // for(let i = 0; i < existingObj.articles.length; i++){
            //     if(existingObj.articles[i].type_id == 1){
            //         existingObj.news.push(existingObj.articles[i]);
            //     }
            //     if(existingObj.articles[i].type_id == 2){
            //         existingObj.announcements.push(existingObj.articles[i]);
            //     }
            //     if(existingObj.articles[i].type_id == 3){
            //         existingObj.events.push(existingObj.articles[i]);
            //     }
            // }
            for(let k = 1; k <= 3; k++  ){
                if(existingObj.article.type.id == k){
                    for(let i = 0; i < existingObj.articles.length; i++){
                        if(existingObj.articles[i].id == existingObj.article.id){
                            console.log(existingObj.others);
                        } 
                    }
                }
            }

            console.log(existingObj.others);

            // for(let i = 0; i < existingObj.articles.length; i++){
            //     if(existingObj.articles[i].type_id == 1){
            //         existingObj.others.push(existingObj.articles[i]);
            //     }
            //     if(existingObj.articles[i].type_id == 2){
            //         existingObj.others.push(existingObj.articles[i]);
            //     }
            //     if(existingObj.articles[i].type_id == 3){
            //         existingObj.others.push(existingObj.articles[i]);
            //     }
            // }
            // console.log(existingObj.others);s
        })
        .catch(function (error) {
            console.log(error)
        });
    }
});
</script>
