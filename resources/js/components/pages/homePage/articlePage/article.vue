<template>
    <div class="flex justify-center h-screen w-screen items-center space-x-4 py-10">
        <div class="lg:w-5/12 w-full h-full shadow-2xl">
            <img src="/img/field1.jpg" class="object-cover w-full" alt="#">  
            <div class="p-10" v-for="{art, key, index} in article">
                sample
            </div>
        </div>
        <div class="w-3/12 h-full">
            Hello
        </div>
    </div>
</template>
<script>
import { defineComponent} from 'vue';
export default defineComponent({
    data(){
        return{
            article: '',
            articles: '',
            events: [],
            news: [],
            announcements: [],
        }
    },
    async created(){
        let id = this.$route.params.id
        let existingObj = this;
        await axios.get(`/api/getArticle/${id}`)
        .then(function (response) {
            existingObj.article = response.data.article
            existingObj.articles = response.data.articles
            console.log(existingObj.article[0].title);
            for(let i = 0; i < existingObj.articles.length; i++){
                if(existingObj.articles[i].type_id == 1){
                    existingObj.news.push(existingObj.articles[i]);
                }
                if(existingObj.articles[i].type_id == 2){
                    existingObj.announcements.push(existingObj.articles[i]);
                }
                if(existingObj.articles[i].type_id == 3){
                    existingObj.events.push(existingObj.articles[i]);
                }
            }
        })
        .catch(function (error) {
            console.log(error)
        });
    }
});
</script>
