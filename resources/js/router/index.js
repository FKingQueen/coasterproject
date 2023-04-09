import {createWebHistory, createRouter} from "vue-router";


import Mainapp from '../components/mainapp.vue';
import Hook from '../components/basic/hooks.vue';
import Method from '../components/basic/methods.vue';

// Project
import Home from '../components/pages/homePage/home.vue';
import Map from '../components/pages/mapPage/map.vue';
import Waterlevel from '../components/pages/mapPage/waterLevel.vue';

// Admin
import articlePlatform from '../components/admin/article/articlePlatform.vue';
import userPlatform from '../components/admin/user/userPlatform.vue';
import setting from '../components/admin/user/setting.vue';


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

    {
        name: 'articlePlatform',
        path: '/articlePlatform',
        component: articlePlatform  
    },
    {
        name: 'userPlatform',
        path: '/userPlatform',
        component: userPlatform  
    },
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