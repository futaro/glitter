
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.config.keyCodes.comma = 188

Vue.component('modal', require('./components/common/modal.vue'));
Vue.component('form-card-nav', require('./components/common/form-card-nav.vue'));
Vue.component('input-money', require('./components/common/input-money.vue'));
Vue.component('input-option', require('./components/products/input-option.vue'));

window.app = new Vue({
    el: '#glitter-admin',
    data: {
        drawerOpen: false,
        screen: {},
    },
    methods: {
        toggleDrawer: function () {
            this.drawerOpen = !this.drawerOpen;
        },
        logout: function () {
            $('form#logoutForm').submit();
        },
    },
});
