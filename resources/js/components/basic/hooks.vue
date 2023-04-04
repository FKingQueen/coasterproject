<template>
    <div>
        <h1 ref="myref">Hook Tutorial</h1>
        <p>{{ name }}</p>
    </div>
</template>

<script>
export default{
    data(){
        return {
            name: 'sample',
        }
    },

    beforeCreate(){
        console.log(this.name)
    },

    created(){
        console.log(this.name);
    },

    mounted(){
        console.log(this.$refs.myref)
    }
}
</script>
