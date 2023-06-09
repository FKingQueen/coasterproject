<template>
    <div>
        <div class="p-2">
            <div class="m-5 bg-white shadow-inner shadow-lg rounded px-10 py-5">
                <div class="flex justify-center text-2xl">
                    Inventory
                </div>
                <a-button  type="primary" @click="this.$router.push('/admin/inventoryPlatform/addForm')" class="mb-2">New Article</a-button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>