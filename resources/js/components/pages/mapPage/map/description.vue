<template>
    <div class="flex justify-center py-5">Description {{ id }}</div>
</template>

<script>
export default {
    props: ["id"],
    created() {
        // console.log(this.id)
    },
};
</script>
