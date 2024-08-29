import { createWebHistory, createRouter } from 'vue-router';
import RegistComponent from '../components/Users/RegistComponent.vue'
import UserRechkComponent from '../components/Info/UserRechkComponent.vue';
import UserUpdateComponet from '../components/Info/UserUpdateComponet.vue';
import UserActivityComponent from '../components/Info/UserActivityComponent.vue';
import UserReviewComponent from '../components/Info/UserReviewComponent.vue';
import UserPoolComponent from '../components/Info/UserPoolLikeComponent.vue';
import EmpUpdateComponent from '../components/Info/EmpUpdateComponent.vue';
import EmpTeacherComponent from '../components/Info/EmpTeacherComponent.vue';
import EmpPoolComponent from '../components/Info/EmpPoolComponent.vue';
import EmpCloseDayComponent from '../components/Info/EmpCloseDayComponent.vue';
import EmpReserveComponent from '../components/Info/EmpReserveComponent.vue';
import EmpReviewComponent from '../components/Info/EmpReviewComponent.vue';

const routes = [
    {
        path: '/',
        redirect: '/main',
    },
    {
        path: '/regist',
        component: RegistComponent,
    },
    {
        path: '/userRechk',
        component: UserRechkComponent,
    },
    {
        path: '/userUpdate',
        component: UserUpdateComponet,
    },
    {
        path: '/userActivity',
        component: UserActivityComponent,
    },
    {
        path: '/userReview',
        component: UserReviewComponent,
    },
    {
        path:'/userPoolLike',
        component: UserPoolComponent,
    },
    {
        path:'/empUpdate',
        component: EmpUpdateComponent,
    },
    {
        path:'/empPool',
        component: EmpPoolComponent,
    },
    {
        path:'/empTeacher',
        component: EmpTeacherComponent,
    },
    {
        path:'/empCloseDay',
        component: EmpCloseDayComponent,
    },
    {
        path:'/empReserve',
        component: EmpReserveComponent,
    },
    {
        path:'/empReview',
        component: EmpReviewComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;