

	<template>

		<div>

			<div v-if = "post">

				<div class = "card">

					<div class = "card-header">

						<img v-bind:src = "'/img/posts/' + post.image" class = "card-img-top" alt = "post.title">

					</div>

					<div class = "card-body">

						<h1 class = "card-title">{{ post.title }}</h1>

						<router-link v-bind:to = "{ name: 'category', params: {category_id: post.category_id} }">

							<h5><span class = "badge badge-info"><i class = "fa fa-bookmark"></i> {{ post.category.category }}</span></h5>

						</router-link>

						<h5><span class = "badge badge-light"><i class = "fa fa-calendar"></i> {{ post.created_at | formatDate }}</span></h5>

						<p>

							<span v-html = "post.content"></span>

						</p>

					</div>

				</div>

			</div>

			<div v-else>

				<h1>Post inexistente</h1>

			</div>

		</div>

	</template>

	<script>

		export default {

			data() {

				return {

					post: ''
					
				}

			},

			created() {

				this.apiPost();

			},

			methods: {

				apiPost() {

					fetch('/api/post/' + this.$route.params.post_id)
					.then(response => response.json())
					.then(json => this.post = json.data)

				}

			}

		}

	</script>

