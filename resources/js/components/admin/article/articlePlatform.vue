<template>
  <div class="p-2">
    <div class="m-5 bg-white shadow-inner shadow-lg rounded px-10 py-5">
      <div class="flex justify-center text-2xl">
        Article Management
      </div>
      <a-button  type="primary" @click="this.$router.push('/addForm')" class="mb-2">New Article</a-button>
      <!-- <Table border :columns="columns" :data="articles" ref="table" v-if="articles.length">
          <template #title="{ row }">
              <strong>{{ row.title }}</strong>
          </template>

          <template #action="{ row, index }">
              <Button type="primary" size="small" style="margin-right: 5px" @click="this.$router.push('/editForm')">Edit</Button>
              <Button type="error" size="small" @click="remove(index)">Delete</Button>
          </template>
      </Table> -->
      <a-table :data-source="articles" :columns="columns">
        <template #headerCell="{ column }">
          <template v-if="column.key === 'name'">
            <span style="color: #1890ff">Name</span>
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
        <template #bodyCell="{ text, column }">
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
        </template>
      </a-table>
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
  data() {
    const state = reactive({
      searchText: '',
      searchedColumn: '',
    });

    const searchInput = ref();

    const columns = [
      {
        title: 'Title',
        dataIndex: 'title',
        key: 'title',
        customFilterDropdown: true,
        onFilter: (value, record) =>
          record.title.toString().toLowerCase().includes(value.toLowerCase()),
        onFilterDropdownVisibleChange: visible => {
          if (visible) {
            setTimeout(() => {
              searchInput.value.focus();
            }, 100);
          }
        },
      },
      {
        title: 'Author',
        dataIndex: 'author',
        key: 'author',
        customFilterDropdown: true,
        onFilter: (value, record) =>
          record.author.toString().toLowerCase().includes(value.toLowerCase()),
        onFilterDropdownVisibleChange: visible => {
          if (visible) {
            setTimeout(() => {
              searchInput.value.focus();
            }, 100);
          }
        },
      },
      {
        title: 'Age',
        dataIndex: 'age',
        key: 'age',
      },
      {
        title: 'Address',
        dataIndex: 'address',
        key: 'address',
        customFilterDropdown: true,
        onFilter: (value, record) =>
          record.address.toString().toLowerCase().includes(value.toLowerCase()),
        onFilterDropdownVisibleChange: visible => {
          if (visible) {
            setTimeout(() => {
              searchInput.value.focus();
            }, 100);
          }
        },
      },
    ];

    return {
      articles: [],
      token: '',
    }
  },
  methods: {
    remove (index) {
      let id = this.articles[index].id
      this.articles.splice(index, 1);
      // let id = this.articles[index]
      console.log(id);

      axios.post(`/api/deleteArticle/${id}`)
      .then(function (response) {
        
        console.log(response.data);
      })
      .catch(function (error) {
        
        console.log(error);
      });
    },
  },

  async created(){
    let existingObj = this;
    this.token = window.Laravel.csrfToken;
    await axios.get('/api/getArticle')
    .then(function (response) {
      existingObj.articles = response.data
    })
    .catch(function (error) {
        if(error){
          this.formValidate.image = image
        }
    });
  }
  
})

</script>

<style>
    .demo-upload-list{
        display: inline-block;
        width: 60px;
        height: 60px;
        text-align: center;
        line-height: 60px;
        border: 1px solid transparent;
        border-radius: 4px;
        overflow: hidden;
        background: #fff;
        position: relative;
        box-shadow: 0 1px 1px rgba(0,0,0,.2);
        margin-right: 4px;
    }
    .demo-upload-list img{
        width: 100%;
        height: 100%;
    }
    .demo-upload-list-cover{
        display: none;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,.6);
    }
    .demo-upload-list:hover .demo-upload-list-cover{
        display: block;
    }
    .demo-upload-list-cover i{
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        margin: 0 2px;
    }
</style>