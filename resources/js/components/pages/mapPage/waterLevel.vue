<template>
    <div ref="gmap" class="w-full h-[80vh] border p-2 flex justify-center">
      <GMapMap 
          :center="this.center"
          :zoom="8"
          map-type-id="terrain"
          style="width: 100vw; height: 100%"
      >
      </GMapMap>
    </div>
</template>

<script>
import { defineComponent, ref } from 'vue';
export default defineComponent({
  name: 'App',
  data() {
    return {
      center: {lat: 17.156009, lng: 121.247046},
    }
  },
  async created() {
    const gmap = this.$refs.gmap
    // console.log(gmap.offsetHeight);
  }
});
</script>