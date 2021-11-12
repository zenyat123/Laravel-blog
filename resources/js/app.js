

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

import router from './router.js';

import moment from 'moment';

import axios from 'axios';

Vue.component('post-modal', require('./components/PostModalComponent.vue').default);

Vue.filter('formatDate', function(value) {

	if(value) {

		return moment(String(value)).format('DD/MM/YYYY');

	}

})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    
    el: '#app',
    router,
    data: {

        title: 'Vue'

    }

})

