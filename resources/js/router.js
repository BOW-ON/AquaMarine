import { createWebHistory, createRouter } from 'vue-router';
import RegistComponent from '../components/Users/RegistComponent.vue'

const routes = [
    {
        path: '/',
        redirect: '/main',
    },
    {
        path: '/regist',
        component: RegistComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;