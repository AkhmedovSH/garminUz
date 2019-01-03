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
import 'viewerjs/dist/viewer.css'
import Viewer from 'v-viewer'
import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

Vue.component('products-component', require('./components/ProductsComponent.vue'));

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VModal);
Vue.use(Viewer);
Vue.use(VueInternationalization);
const lang = document.documentElement.lang.substr(0, 2); 
const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});
const app = new Vue({
    el: '#app',
});
