

	import Vue from 'vue';
	import VueRouter from 'vue-router';
	import CategoryList from './components/CategoryListComponent.vue';
	import PostList from './components/PostListComponent.vue';
	import PostDetail from './components/PostDetailComponent.vue';
	import PostCategory from './components/PostCategoryComponent.vue';
	import Contact from './components/ContactComponent.vue';

	Vue.use(VueRouter);

	export default new VueRouter({

		mode: 'history',
		routes: [

			{ path: '/', name: 'posts', component: PostList },
			{ path: '/categories', name: 'categories', component: CategoryList },
			{ path: '/category/:category_id', name: 'category', component: PostCategory },
			{ path: '/post/:post_id', name: 'post', component: PostDetail },
			{ path: '/contact', name: 'contact', component: Contact }

		]

	})

