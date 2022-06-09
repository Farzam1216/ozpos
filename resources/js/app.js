/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
// ES6 Modules or TypeScript
import swal from 'sweetalert'
import VueSmoothScroll from 'v-smooth-scroll'

// Vue 2.x
Vue.use(VueSmoothScroll)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar-component', require('./components/NavbarComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('index-component', require('./components/IndexComponent.vue').default);
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('forgotpassword-component', require('./components/ForgotpasswordComponent.vue').default);
Vue.component('verification-component', require('./components/VerificationComponent.vue').default);
Vue.component('resturant-component', require('./components/ResturnatComponent.vue').default);
Vue.component('resturantcode-component', require('./components/ResturantQrCode.vue').default);
Vue.component('checkout-component', require('./components/CheckoutComponent.vue').default);
Vue.component('checkoutqr-component', require('./components/CheckoutqrComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);
Vue.component('myorder-component', require('./components/MyorderComponent.vue').default);
Vue.component('contactus-component', require('./components/ContactusComponent.vue').default);
Vue.component('privacy-component', require('./components/PrivacyComponent.vue').default);
Vue.component('terms-component', require('./components/TermsComponent.vue').default);
Vue.component('successfull-component', require('./components/SuccessfullComponent.vue').default);
Vue.component('track-component', require('./components/TrackComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});