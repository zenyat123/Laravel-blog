

	<template>

		<div>

			<div v-if = "post">

				<div class = "card mb-3">

					<div class = "card-header">

						<img v-bind:src = "'/img/posts/' + post.image" class = "card-img-top" alt = "post.title">

					</div>

					<div class = "card-body">

						<h1 class = "card-title">{{ post.title }}</h1>

						<router-link v-bind:to = "{ name: 'category', params: {category_id: post.category.url} }">

							<h4><span class = "badge badge-info">{{ post.category.category }}</span></h4>							

						</router-link>

						<span v-for = "tag in tags" class = "badge badge-pill badge-info mr-1 mb-3"><i class = "fa fa-bookmark"></i> {{ tag.tag }}</span>

						<h5><span class = "badge badge-light"><i class = "fa fa-calendar"></i> {{ post.created_at | formatDate }}</span></h5>

						<span v-html = "post.content"></span>

					</div>

				</div>

				<div v-if = "post.comments != 0">

					<h3 class = "mt-3 mb-3">Comentarios</h3>

					<div class = "row">

						<div class = "col-md-3 col-12" v-for = "comment in comments" v-bind:key = "comment.id">

							<div v-if = "comment.approved == 1">

								<div class = "card mb-3">

									<div class = "card-header">

										{{ comment.title }}

									</div>

									<div class = "card-body">

										<p class = "card-text">

											{{ comment.comment }}

										</p>

									</div>

								</div>

							</div>

						</div>

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

					post: '',
					comments: '',
					tags: ''
					
				}

			},

			created() {

				this.apiPost();

			},

			methods: {

				apiPost() {

					fetch('/api/post/' + this.$route.params.post_id)
					.then(response => response.json())
					.then(json => {

						this.post = json.data;
						this.comments = json.data.comments;
						this.tags = json.data.tags;

					})

				}

			}

		}

	</script>

