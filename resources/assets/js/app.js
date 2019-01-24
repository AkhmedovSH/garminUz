/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VModal from 'vue-js-modal'
import Viewer from 'v-viewer'
import VueCarousel from 'vue-carousel';
import { Carousel, Slide } from 'vue-carousel';
Vue.use(VueCarousel);
Vue.use(Carousel);
Vue.use(Slide);




Vue.component('products-component', require('./components/ProductsComponent.vue'));
Vue.component('one-product-component', require('./components/OneProductComponent.vue'));

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VModal);
Vue.use(Viewer);



const app = new Vue({
    el: '#app',
    
});
