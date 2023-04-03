import {createWebHistory, createRouter} from "vue-router";


import Mainapp from '../components/mainapp.vue';
import Sample from '../components/sample.vue';
import PageNotFound from '../components/pageNotFound.vue';


export const routes = [
    {
        name: 'mainapp',
        path: '/',
        component: Mainapp
    },
    {
        name: 'sample',
        path: '/sample',
        component: Sample
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;