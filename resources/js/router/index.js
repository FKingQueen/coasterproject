import {createWebHistory, createRouter} from "vue-router";


import Mainapp from '../components/mainapp.vue';
import Hook from '../components/basic/hooks.vue';
import Method from '../components/basic/methods.vue';

// Project
import Home from '../components/pages/homePage/home.vue';
import Map from '../components/pages/mapPage/map.vue';
import Waterlevel from '../components/pages/mapPage/waterLevel.vue';

// Admin

// Article
import articlePlatform from '../components/admin/article/articlePlatform.vue';
import addArticleForm from '../components/admin/article/addForm.vue';
import editArticleForm from '../components/admin/article/editForm.vue';

// User
import userPlatform from '../components/admin/user/userPlatform.vue';
import addUserForm from '../components/admin/user/addForm.vue';
import editUserForm from '../components/admin/user/editForm.vue';

// Settings
import setting from '../components/admin/settings/setting.vue';


export const routes = [
    {
        name: 'hook',
        path: '/hook',
        component: Hook
    },
    {
        name: 'mainapp',
        path: '/mainapp',
        component: Mainapp
    },
    {
        name: 'method',
        path: '/method',
        component: Method
    },

    // Project

    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'map',
        path: '/map',
        component: Map  
    },
    {
        name: 'waterLevel',
        path: '/waterLevel',
        component: Waterlevel  
    },

    // Admin

    // Article
    {
        name: 'articlePlatform',
        path: '/articlePlatform',
        component: articlePlatform  
    },
    {
        name: 'addArticleForm',
        path: '/articlePlatform/addForm',
        component: addArticleForm  
    },
    {
        name: 'editArticleForm',
        path: '/articlePlatform/editForm/:id',
        component: editArticleForm ,
        props:true
    },

    //User 
    {
        name: 'userPlatform',
        path: '/userPlatform',
        component: userPlatform  
    },
    {
        name: 'addUserForm',
        path: '/userPlatform/addForm',
        component: addUserForm  
    },
    {
        name: 'editUserForm',
        path: '/userPlatform/editForm',
        component: editUserForm  
    },
    // Settings
    {
        name: 'setting',
        path: '/setting',
        component: setting  
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;