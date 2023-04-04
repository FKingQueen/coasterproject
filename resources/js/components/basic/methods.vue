<template>
    <div>
        <h1>we can have some data here {{ views }}</h1>
        <button @click="updateCounter(1)">Increase</button>
        <button @click="updateCounter(-1)">Decrease</button>


        <div v-for="(blog, i) in blogs" :ket="i" v-if="blogs.length">
            <h1>{{blog.title}}</h1>
            <h1>{{blog.post}}</h1>
        </div>

        <div>
            <h1 v-if="showItem">show this item if "showItem" is true</h1>
            <h1 v-else>show this item if "showItem" is false</h1>
        </div>

        <button @click="showItem=!showItem">Change showItem</button>
       


    </div>
</template>

<script>
export default{
    data() {
        return {
            views : 0,
            blogs : [],
            showItem : false
        }
    },
    methods: {
        updateCounter(number){
            this.views += number
        }
    },
    created(){
        this.views = 100;

        let posts = [
            {title: 'this is the blog title', 'post' :'this is the blog post', id : 1},
            {title: 'this is the blog title', 'post' :'this is the blog post', id : 2},
            {title: 'this is the blog title', 'post' :'this is the blog post', id : 3},
            {title: 'this is the blog title', 'post' :'this is the blog post', id : 4},
        ]

        this.blogs = posts
    }
}
</script>