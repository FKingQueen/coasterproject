<template>
    <div>
        Search
    </div>
</template>


<script>
import { defineComponent, ref, reactive, toRefs, watch } from 'vue';

export default defineComponent({
    data() {
        return {
            formSearch: {
                data: '',
            }
        }
    },
    async created(){
        let existingObj = this;
        existingObj.formSearch.data == this.$route.params.search
        console.log(existingObj.formSearch);
        await axios.get('/api/searchArticle', existingObj.formSearch)
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {

        });
    }
})
</script>
