<template>
    <div class="w-full h-full">
        <div class="h-full">
            <div class="w-full flex justify-center">
                <div class="w-11/12  drop-shadow-md">
                    <Image :src="`/inventory/high/${dataMarker.image}`" class="object-cover  border" />
                </div>
            </div>
            <p class="w-full flex justify-center text-sm pt-2">
                Lat. {{ dataMarker.latitude }}, Lng {{ dataMarker.longitude }}
            </p>
            <div class="px-5 pb-5 divide-y">
                <p class="text-sm py-1"> <span class="font-semibold">Location:</span> {{ dataMarker.barangay }}, {{
                    dataMarker.municipality }}, {{ dataMarker.province }} </p>
                <p class="text-sm py-1"> <span class="font-semibold">Shoreline use:</span> {{ dataMarker.shoreline }}</p>
                <p class="text-sm py-1"> <span class="font-semibold">Morphology:</span> {{ dataMarker.morphology }}</p>
                <p class="text-sm py-1"> <span class="font-semibold">Type of Coastal Structure:</span> {{
                    dataMarker.typeStructure }}</p>
                <p class="text-sm py-1"> <span class="font-semibold">Structure Material:</span> {{
                    dataMarker.structureMaterial }}</p>
                <p class="text-sm py-1"> <span class="font-semibold">Waves Acting on Structure:</span> {{
                    dataMarker.wavesStructure }}</p>
                <p class="text-sm py-1"> <span class="font-semibold">Coastal Hazard:</span> {{ dataMarker.coastalHazard }}
                </p>
                <p class="text-sm py-1"> <span class="font-semibold">Protection Toe:</span> {{ dataMarker.protectionToe }}
                </p>
                <p class="text-sm py-1"> <span class="font-semibold">Height of Structure:</span> {{
                    dataMarker.heightStructure }}</p>
                <p class="text-sm py-1"> <span class="font-semibold">Length of Structure:</span> {{
                    dataMarker.lengthStructure }}</p>
                <div class="py-1">
                    <p class="text-base mt-2 text-center"> <span class="font-bold">Typology</span></p>
                    <p class="text-sm mt-2"><span class="font-semibold">Landwards:</span> {{ dataMarker.landwardsTypology }}
                    </p>
                    <p class="text-sm mt-2"><span class="font-semibold">Shoreline:</span> {{ dataMarker.shorelineTypology }}
                    </p>
                    <p class="text-sm mt-2"><span class="font-semibold">Nearshore:</span> {{ dataMarker.nearshoreTypology }}
                    </p>
                </div>
                <div class="py-1">
                    <p class="text-base mt-2 text-center"> <span class="font-bold">Description</span></p>
                    <p class="text-sm text-justify mt-2" v-html="dataMarker.description"></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent, ref } from 'vue';
export default defineComponent({
    props: ['id'],
    data() {
        return {
            markers: '',
            dataMarker: ''
        }
    },
    async created() {
        let existingObj = this;
        await axios.get('/api/getInventory')
            .then(response => {
                existingObj.markers = response.data
            })
            .catch(function (error) {
                console.error(error);
            });

        for (let i = 0; i < existingObj.markers.length; i++) {
            if (this.id == existingObj.markers[i].id) {
                existingObj.dataMarker = existingObj.markers[i]
            }
        }
        console.log(existingObj.dataMarker);
    }
})
</script>

