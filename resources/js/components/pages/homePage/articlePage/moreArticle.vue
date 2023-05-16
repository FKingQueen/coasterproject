<template>
    <div :class="{ 'h-screen': !isLoaded }" class="">
        <div v-if="isLoaded" class="lg:flex lg:px-0 px-2 justify-center lg:space-x-6 space-x-0 py-10">
            <div class="lg:w-6/12 w-full h-full ">
                <div v-for="(more, key) in this.moreArticle" class="flex block border-b pb-1 mb-3">
                    <img  class="cursor-pointer bg-sky-200 object-cover object-center blur-none w-20 h-20 " :src="`/uploads/low/${more.image}`">
                    <div class="block w-fit px-1 overflow-hidden">
                        <p class="cursor-pointer text-sm blur-none font-semibold text-sky-600  truncate">hello</p>
                        <h1 class="text-xs blur-none">Announcements |</h1>
                        <h1 class="text-xs blur-none text-justify line-clamp-3"></h1>
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
        return {
            moreArticle: [],
            articles: [],
            isLoaded: ref(false)
        }
    },
    async created(){
        let existingObj = this;
        let articleName = this.$route.params.article
        let articleId = ''
        
        if(articleName == 'news'){
            articleId = 1;
        } else if(articleName == 'announcements'){
            articleId = 2;
        } else if(articleName == 'events'){
            articleId = 3;
        }

        await axios.get(`/api/getmoreArticle/${articleId}`)
        .then(function (response) {
            existingObj.moreArticle = response.data.moreArticle
            existingObj.article = response.data.articles
            existingObj.isLoaded = true;
        })
        .catch(function (error) {
            console.log(error)
        });
        console.log(existingObj.isLoaded);
    }
})
</script>