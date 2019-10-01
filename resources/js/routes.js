import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './components/Home.vue';
import About from './components/About.vue';
import Service from './components/Service.vue';
import Portfolio from './components/Portfolio.vue';
import Contact from './components/Contact.vue';
import Product from './components/Product.vue';
import SingleProduct from './components/SingleProduct.vue';
import NotFound from './components/404';


const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/about',
      name: 'about',
      component: About,
    },
    {
      path: '/services',
      name: 'services',
      component: Service,
    },
    {
      path: '/portfolio',
      name: 'portfolio',
      component: Portfolio,
    },
    {
      path: '/contact',
      name: 'contact',
      component: Contact,
    },
    {
      path: '/products',
      name: 'products',
      component: Product,
    },
    {
      path: '/product/:slug',
      name: 'product',
      component: SingleProduct,
      props: true,
    },
    // { 
    //   path: '/*',
    //   component: NotFound
    // }
  ]
});   

export default router;