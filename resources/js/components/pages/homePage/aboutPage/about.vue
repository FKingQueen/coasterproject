<template>
    <div class="w-full flex justify-center py-10">
        <a-tabs v-model:activeKey="activeKey" class="w-3/4 ">
            <a-tab-pane key="1" tab="ORGANIZATIONAL STRUCTURE">NOT YET AVAILABLE</a-tab-pane>
            <a-tab-pane key="2" tab="ACCOMPLISHMENT" force-render>NOT YET AVAILABLE</a-tab-pane>
        </a-tabs>
    </div>

  </template>
  <script>
  import { defineComponent, ref } from 'vue';
  export default defineComponent({
    setup() {
      return {
        activeKey: ref('1'),
      };
    },
    created(){
      this.activeKey = this.$route.params.id
    }
  });
  </script>