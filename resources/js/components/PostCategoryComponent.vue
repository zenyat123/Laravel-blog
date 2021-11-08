

	<template>

		<div>

			<div v-if = "total > 0">

				<h2><span class = "badge badge-info">{{ category.category }}</span></h2>

				<div class = "row">

					<div class = "col-md-4 col-12" v-for = "post in posts" v-bind:key = "post.id">					

						<div class = "card">

							<img v-bind:src = "'/img/posts/' + post.image" class = "card-img-top image" alt = "post.title">

							<div class = "card-body">

								<h4 class = "card-title">{{ post.title.substring(0,29) }}</h4>

								<p class = "card-text">

									<span v-html = "post.content.substring(0,130)"></span>

								</p>

								<button class = "btn btn-primary" v-on:click = "postClick(post)">Ver resumen</button>

								<router-link v-bind:to = "{ name: 'post', params: {post_id: post.id} }" class = "btn btn-success">Ver completo</router-link>

							</div>

						</div>				

					</div>

				</div>

				<div class = "row justify-content-center">

					<v-pagination v-model = "currentPage" class = "mt-3"

						v-bind:page-count = "pages" 
						v-bind:classes = "bootstrapPaginationClasses" 
						v-bind:labels = "paginationAnchorTexts">

					</v-pagination>

				</div>

				<post-modal v-bind:getPost = "postSelected"></post-modal>

			</div>

			<div v-else>

				<h1>Sin posts</h1>

			</div>

		</div>

	</template>

	<script>

		import vPagination from 'vue-plain-pagination';

		export default {

			data() {

				return {

					postSelected: '',
			    	posts: [],
			    	category: '',
			    	currentPage: 1,
			    	pages: '',
			    	total: '',
			    	bootstrapPaginationClasses: {

			    		ul: 'pagination',
			    		li: 'page-item',
			    		liActive: 'active',
			    		liDisable: 'disabled',
			    		button: 'page-link'

			    	},
			    	paginationAnchorTexts: {

			    		first: '',
			    		prev: '&laquo;',
			    		next: '&raquo;',
			    		last: ''

			    	}

			    }

			},

			created() {

				this.apiPosts();

			},

			methods: {

				postClick: function(post) {

					this.postSelected = post;

				},

				apiPosts() {

					fetch('/api/post/' + this.$route.params.category_id + '/category?page=' + this.currentPage)
					.then(response => response.json())
					.then(json => {

						this.category = json.data.category;
						this.posts = json.data.posts.data;
						this.pages = json.data.posts.last_page;
						this.total = json.data.posts.to;

					})

				}

			},

			watch: {

				currentPage: function(newVal, oldVal) {

					this.apiPosts();

				}

			},

			components: {

				vPagination

			}

		}

	</script>	

