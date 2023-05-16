import {createWebHistory, createRouter} from "vue-router";

// Project
import homePage from '../components/home.vue';

// Home
import Home from '../components/pages/homePage/home.vue';

// Article
import Article  from '../components/pages/homePage/articlePage/article.vue';
import moreArticle  from '../components/pages/homePage/articlePage/moreArticle.vue';

// Map
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

// Login
import login from '../components/login.vue';

// Dashboard
import dashboard from '../components/dashboard.vue';

export const routes = [
    // Login
    {
        name: 'login',
        path: '/login',
        component: login,
    },

    // Project
    {
        path: '/',
        component: homePage,
        children:[
            {
                name: 'home',
                path: '/',
                component: Home ,
            },
            {
                name: 'article',
                path: '/:article/:title/:id',
                component: Article ,
                props:true 
            },
            {
                name: 'moreArticle',
                path: '/:article',
                component: moreArticle ,
                props:true 
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
        ]
    },
    {
        path: '/admin',
        component: dashboard,
        meta : {requiresAuth: true},
        children:[
            // Admin

            // Article
            {
                name: 'articlePlatform',
                path: '/admin/articlePlatform',
                component: articlePlatform  
            },
            {
                name: 'addArticleForm',
                path: '/admin/articlePlatform/addForm',
                component: addArticleForm  
            },
            {
                name: 'editArticleForm',
                path: '/admin/articlePlatform/editForm/:id',
                component: editArticleForm ,
                props:true
            },

            //User 
            {
                name: 'userPlatform',
                path: '/admin/userPlatform',
                component: userPlatform  
            },
            {
                name: 'addUserForm',
                path: '/admin/userPlatform/addForm',
                component: addUserForm  
            },
            {
                name: 'editUserForm',
                path: '/admin/userPlatform/editForm/:id',
                component: editUserForm,  
                props:true
            },
            // Settings
            {
                name: 'setting',
                path: '/admin/setting',
                component: setting  
            },
        ]
    },

    
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)){
        if(!window.Laravel.isLoggedin){
            next({
                name: "login"
            })
        }
         else {
            next();
        }
    } else {
        next();
    }
});


export default router;