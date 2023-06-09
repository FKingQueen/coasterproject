import {createApp} from 'vue';

require('./bootstrap');


import App from './App.vue';
import store from './store/index';
import axios from 'axios';
import router from './router';
import ViewUIPlus from 'view-ui-plus';
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
import 'view-ui-plus/dist/styles/viewuiplus.css';
import locale from 'view-ui-plus/dist/locale/en-US';
import CKEditor from '@ckeditor/ckeditor5-vue';
import VueGoogleMaps from '@fawmi/vue-google-maps'




const app = createApp(App);
app.config.globalProperties.$axios = axios;
app.use(ViewUIPlus, {locale: locale});
app.use(store);
app.use(router);
app.use(Antd);
app.use(CKEditor);
app.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBqrwTHtdIIy2XFwP3GkVGaMqtEfjjwJuY',
    },
});
app.mount('#app');