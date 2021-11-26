

	<template>

		<div v-if = "total > 0">

			<div class = "row">

				<div class = "col-md-4 col-12" v-for = "post in posts" v-bind:key = "post.id">

					<div class = "card">
						
						<img v-bind:src = "'/img/posts/' + post.image" class = "card-img-top image" alt = "post.title">

						<div class = "card-body">
							
							<h4 class = "card-title">{{ post.title.substring(0,29) }}</h4>

							<h5><span class = "badge badge-light"><i class = "fa fa-calendar"></i> {{ post.created_at | formatDate }}</span></h5>

							<p class = "card-text">

								<span v-html = "post.content.substring(0,130)"></span>

							</p>

							<button class = "btn btn-primary" v-on:click = "postClick(post)">Ver resumen</button>

							<router-link v-bind:to = "{ name: 'post', params: {post_id: post.url} }" class = "btn btn-success">Ver completo</router-link>

						</div>

					</div>

				</div>

			</div>

			<div class = "row justify-content-center">

				<v-pagination v-model = "currentPage" class = "mt-3"

					v-bind:page-count = "total" 
					v-bind:classes = "bootstrapPaginationClasses" 
					v-bind:labels = "paginationAnchorTexts">

				</v-pagination>

			</div>

			<post-modal v-bind:getPost = "postSelected"></post-modal>

		</div>

	</template>

	<script>

		import vPagination from 'vue-plain-pagination';

		export default {

			data() {

				return {

					postSelected: '',
			    	posts: [],
			    	currentPage: 1,
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

					fetch('/api/post?page=' + this.currentPage)
					.then(response => response.json())
					.then(json => {

						this.posts = json.data.data;
						this.total = json.data.last_page;

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

