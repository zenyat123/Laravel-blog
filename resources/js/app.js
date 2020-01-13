/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

import router from './router.js';

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import MyUploadAdapter from './plugins/myuploadadapter.js';

import moment from 'moment';

import axios from 'axios';

Vue.component('post-modal', require('./components/PostModalComponent.vue').default);

Vue.filter('formatDate', function(value){

	if(value){

		return moment(String(value)).format('DD/MM/YYYY');

	}

})

function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        // Configure the URL to the upload script in your back-end here!
        return new MyUploadAdapter( loader );
    };  
}

ClassicEditor.create(document.querySelector('#content'), {

	extraPlugins: [MyCustomUploadAdapterPlugin]

})
.then(editor => {})
.catch(error => {})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//  Vue.component('example-component', require('./components/ExampleComponent.vue').default);

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

