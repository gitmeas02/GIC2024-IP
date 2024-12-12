import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Page1 from '@/components/Page1.vue';
import Page2 from '@/components/Page2.vue';
import Page3 from '@/components/Page3.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/page1',
      name: 'page1',
      component:Page1
    },
    {
      path: '/page2',
      name: 'page2',
      component:Page2
    },
    {
      path: '/page3',
      name: 'page3',
      component:Page3
    },
  ],
})

export default router;
