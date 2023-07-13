<template>
    <div>
        <div class="p-2">
            <div class="m-5 bg-white shadow-inner shadow-lg rounded px-10 py-5">
                <div class="flex justify-center text-2xl">
                    Inventory
                </div>
                <div class="mb-2 flex justify-start gap-1">
                  <a-button  type="primary" @click="this.$router.push('/admin/inventoryPlatform/addForm')" class="mb-2">New Inventory</a-button>

                  <Upload 
                    :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
                    :on-success="handleSuccess"
                    :on-error="handleError"
                    :format="['csv','xlsx']"
                    :multiple="false"
                    :on-format-error="handleFormatError"
                    action="/api/admin/importInventory"
                  >
                      <Button icon="ios-cloud-upload-outline">Import File</Button>
                  </Upload>
                </div>


                <a-table :data-source="inventories" :columns="columns" size="small">
                    <template #headerCell="{ column }">
                    <template v-if="column.key === 'title'">
                        <span style="color: #1890ff">Title</span>
                    </template>

                    </template>
                    <template
                    #customFilterDropdown="{ setSelectedKeys, selectedKeys, confirm, clearFilters, column }"
                    >
                    <div style="padding: 8px">
                        <a-input
                        ref="searchInput"
                        :placeholder="`Search ${column.dataIndex}`"
                        :value="selectedKeys[0]"
                        style="width: 188px; margin-bottom: 8px; display: block"
                        @change="e => setSelectedKeys(e.target.value ? [e.target.value] : [])"
                        @pressEnter="handleSearch(selectedKeys, confirm, column.dataIndex)"
                        />
                        <a-button
                        type="primary"
                        size="small"
                        style="width: 90px; margin-right: 8px"
                        @click="handleSearch(selectedKeys, confirm, column.dataIndex)"
                        >
                        <template #icon><SearchOutlined /></template>
                        Search
                        </a-button>
                        <a-button size="small" style="width: 90px" @click="handleReset(clearFilters)">
                        Reset
                        </a-button>
                    </div>
                    </template>
                    <template #customFilterIcon="{ filtered }">
                    <search-outlined :style="{ color: filtered ? '#108ee9' : undefined }" />
                    </template>
                    <template #bodyCell="{ text, column, record, index}">
                    <span v-if="searchText && searchedColumn === column.dataIndex">
                        <template
                        v-for="(fragment, i) in text
                            .toString()
                            .split(new RegExp(`(?<=${searchText})|(?=${searchText})`, 'i'))"
                        >
                        <mark
                            v-if="fragment.toLowerCase() === searchText.toLowerCase()"
                            :key="i"
                            class="highlight"
                        >
                            {{ fragment }}
                        </mark>
                        <template v-else>{{ fragment }}</template>
                        </template>
                    </span>
                    <template v-else-if="column.key === 'action'">
                        <span>
                          <a @click="openModal(index)">Details</a>
                          <Modal v-model="modal" :closable="false" :mask-closable="false" :footer-hide="true" title="Article" width="1000">
                                <template #header>
                                  <div class="text-center">
                                      <h2>Inventory Details</h2>
                                  </div>
                                </template>
                                <Image :src="`/inventory/high/${modalData.image}`" class="object-fit  border" />
                                <div class="py-5">
                                  <p class="text-base"> <span class="font-bold">Location:</span> {{ modalData.barangay }}, {{ modalData.municipality }}, {{ modalData.province }}</p>
                                  <p class="text-base"> <span class="font-bold">Coordinates:</span> Lat. {{ modalData.latitude }}, Lng {{ modalData.longitude }}</p>
                                  <p class="text-base"> <span class="font-bold">Shoreline use:</span> {{ modalData.shoreline }}</p>
                                  <p class="text-base"> <span class="font-bold">Morphology:</span> {{ modalData.morphology }}</p>
                                  <p class="text-base"> <span class="font-bold">Type of Coastal Structure:</span> {{ modalData.typeStructure }}</p>
                                  <p class="text-base"> <span class="font-bold">Structure Material:</span> {{ modalData.structureMaterial }}</p>
                                  <p class="text-base"> <span class="font-bold">Waves Acting on Structure:</span> {{ modalData.wavesStructure }}</p>
                                  <p class="text-base"> <span class="font-bold">Coastal Hazard:</span> {{ modalData.coastalHazard }}</p>
                                  <p class="text-base"> <span class="font-bold">Protection Toe:</span> {{ modalData.protectionToe }}</p>
                                  <p class="text-base"> <span class="font-bold">Height of Structure:</span> {{ modalData.heightStructure }}</p>
                                  <p class="text-base"> <span class="font-bold">Length of Structure:</span> {{ modalData.lengthStructure }}</p>
                                  <p class="text-base"> <span class="font-bold">Typology:</span></p>
                                  <p class="pl-5"><span class="font-bold">Landwards:</span> {{ modalData.landwardsTypology }}</p>
                                  <p class="pl-5"><span class="font-bold">Shoreline:</span> {{ modalData.shorelineTypology }}</p>
                                  <p class="pl-5"><span class="font-bold">Nearshore:</span> {{ modalData.nearshoreTypology }}</p>
                                  <p class="text-base"> <span class="font-bold">Description:</span></p>
                                  <p class="text-base" v-html="modalData.description"></p>
                                </div>
                                <div class="space-x-2 text-right">
                                  <a @click="editForm(modalData.id)">Edit</a>
                                  <a-divider type="vertical" />
                                  <a @click="removeModal()">Done</a>
                                </div>
                          </Modal>  
                          <a-divider type="vertical" />
                          <a-popconfirm
                              v-if="inventories.length"
                              title="Sure to delete?"
                              @confirm="remove(index)"
                          >
                              <a class="hover:text-red-500">Delete</a>
                          </a-popconfirm>
                        </span>
                    </template>

                    <template v-else-if="column.key === 'image'">
                        <a-image
                        style="height: 35px"
                            :src="`/inventory/low/${record.image}`"
                        :preview="{
                            src: `/inventory/high/${record.image}`,
                        }"
                        />
                    </template>
                    </template>

                </a-table>

            </div>
        </div>
    </div>
</template>

<script>
import { notification } from 'ant-design-vue';
import { SearchOutlined } from '@ant-design/icons-vue';
import { defineComponent, reactive, ref, toRefs } from 'vue';

export default defineComponent({
  components: {
    SearchOutlined,
  },
  setup() {
    const state = reactive({
      searchText: '',
      searchedColumn: '',
    });
    const searchInput = ref();
    const columns = [{
      title: 'Province',
      dataIndex: 'province',
      key: 'province',
      customFilterDropdown: true,
      onFilter: (value, record) => record.province.toString().toLowerCase().includes(value.toLowerCase()),
      onFilterDropdownVisibleChange: visible => {
        if (visible) {
          setTimeout(() => {
            searchInput.value.focus();
          }, 100);
        }
      },
    }, {
      title: 'Municipality',
      dataIndex: 'municipality',
      key: 'municipality',
      customFilterDropdown: true,
      onFilter: (value, record) => record.municipality.toString().toLowerCase().includes(value.toLowerCase()),
      onFilterDropdownVisibleChange: visible => {
        if (visible) {
          setTimeout(() => {
            searchInput.value.focus();
          }, 100);
        }
      },
    }, {
      title: 'Barangay',
      dataIndex: 'barangay',
      key: 'barangay',
      customFilterDropdown: true,
      onFilter: (value, record) => record.barangay.toString().toLowerCase().includes(value.toLowerCase()),
      onFilterDropdownVisibleChange: visible => {
        if (visible) {
          setTimeout(() => {
            searchInput.value.focus();
          }, 100);
        }
      },
    }, {
      title: 'Image',
      dataIndex: 'image',
      key: 'image',
      width: 200,
    }, {
      title: 'Action',
      key: 'action',
      width: 200,
    }];
    const handleSearch = (selectedKeys, confirm, dataIndex) => {
      confirm();
      state.searchText = selectedKeys[0];
      state.searchedColumn = dataIndex;
    };
    const handleReset = clearFilters => {
      clearFilters({
        confirm: true,
      });
      state.searchText = '';
    };
    return {
      columns,
      handleSearch,
      handleReset,
      searchInput,
      ...toRefs(state)
    }
  },
  data(){
    return{
      token: '',
      modalData: '',
      modal: false,
      inventories: [],
      token: '',
    }
  },
  methods: {
    remove(key){
      let id = this.inventories[key].id
      this.inventories.splice(key, 1);

      axios.post(`/api/admin/deleteInventory/${id}`)
      .then(function (response) {
        notification.success({
            message: 'Notification',
            description: 'The Data is Successfully Deleted',
        });
      })
      .catch(function (error) {
        
        console.log(error);
      });
    },
    async openModal(index){
      let existingObj = this;
      existingObj.modalData = existingObj.inventories[index]
      this.modal = true;
    },
    editForm(id){
      this.modal = false;
      this.$router.push({path: '/admin/inventoryPlatform/editForm/' + id})
    },
    removeModal(){
      this.modal = false;
    },
    handleSuccess (res, file) {
        console.log(res);
    },
    handleError (res, file) {
        console.log('res', res);
    },
    handleFormatError (file) {
        notification.warning({
            message: 'The file format is incorrect',
            description: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
        });
    },
  },
  async created(){
    let existingObj = this;
    this.token = window.Laravel.csrfToken;
    await axios.get('/api/admin/getInventory')
    .then(function (response) {
      existingObj.inventories = response.data
    })
    .catch(function (error) {
        if(error){
          this.formValidate.image = image
        }
    });
  }
})
</script>