import {createWebHistory, createRouter} from "vue-router";

// Project
import homePage from '../components/home.vue';

// Home
import Home from '../components/pages/homePage/home.vue';

// Article
import Article  from '../components/pages/homePage/articlePage/article.vue';
import moreArticle  from '../components/pages/homePage/articlePage/moreArticle.vue';

// Search
import Search  from '../components/pages/homePage/articlePage/search.vue';

// Map
import Gee from '../components/pages/mapPage/gee.vue';
import Map from '../components/pages/mapPage/map.vue';

// Projects
import Project1 from '../components/pages/homePage/projectsPage/project1.vue';
import Project2 from '../components/pages/homePage/projectsPage/project2.vue';
import Project3 from '../components/pages/homePage/projectsPage/project3.vue';
import Project4 from '../components/pages/homePage/projectsPage/project4.vue';

// About
import About from '../components/pages/homePage/aboutPage/about.vue';

// Admin

// Inventory
import inventoryPlatform from '../components/admin/inventory/inventoryPlatform.vue';
import addInventoryForm from '../components/admin/inventory/addForm.vue';
import editInventoryForm from '../components/admin/inventory/editForm.vue';

// Slide Show
import slideShowPlatform from '../components/admin/slideshow/slideShowPlatform.vue';
// import addArticleForm from '../components/admin/article/addForm.vue';
// import editArticleForm from '../components/admin/article/editForm.vue';

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

// User Account
import userAccount from '../components/admin/userAccount/userAccount.vue';

// Login
import login from '../components/login.vue';

// Dashboard
import dashboard from '../components/admin/dashboard.vue';

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
            // Projects
            {
                name: 'project1',
                path: '/projects/project1',
                component: Project1,
                props:true 
            },
            {
                name: 'project2',
                path: '/projects/project2',
                component: Project2,
                props:true 
            },
            {
                name: 'project3',
                path: '/projects/project3',
                component: Project3,
                props:true 
            },
            {
                name: 'project4',
                path: '/projects/project4',
                component: Project4,
                props:true 
            },
            // Projects
            {
                name: 'gee',
                path: '/gee',
                component: Gee  
            },
            {
                name: 'map',
                path: '/map',
                component: Map,
            },
            {
                name: 'about',
                path: '/about/:id',
                component: About,
            },
            {
                name: 'search',
                path: '/search/:search',
                component: Search  
            },
        ]
    },
    // Admin
    {
        path: '/admin',
        component: dashboard,
        meta : {requiresAuth: true},
        children:[
            // Inventory
            {
                name: 'inventoryPlatform',
                path: '/admin/inventoryPlatform',
                component: inventoryPlatform
            },
            {
                name: 'addInventoryForm',
                path: '/admin/inventoryPlatform/addForm',
                component: addInventoryForm
            },
            {
                name: 'editInventoryForm',
                path: '/admin/inventoryPlatform/editForm/:id',
                component: editInventoryForm ,
                props:true
            },
            // SlideShow
            {
                name: 'slideShowPlatform',
                path: '/admin/slideShowPlatform',
                component: slideShowPlatform
            },
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
            {
                name: 'userAccount',
                path: '/admin/userAccount',
                component: userAccount
            },
        ]
    },

    
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    scrollBehavior (to, from, savedPosition) {
        return { top: 0 , behavior: 'smooth'}
    }
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