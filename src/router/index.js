
import DetailsView from '@/views/DetailsView.vue';
import HomeView from '@/views/HomeView.vue';
import ListView from '@/views/ListView.vue';
import { createRouter, createWebHistory } from 'vue-router'

const routes =[
  {
    path:'/',
    name: 'home',
    component:HomeView,
  },
  {
    path: '/product/:id',
    name: 'ProductDetails',
    component: DetailsView,
    props: true,
  },
  {
    path:'/lists',
    name:'lists',
    component:ListView,
  },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

export default router;
