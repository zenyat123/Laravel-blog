

	<template>

		<div>

			<div class = "row" v-if = "categories">

				<div class = "col-md-3" v-for = "category in categories" v-bind:key = "category.id">

					<div class = "card">

						<router-link v-bind:to = "{ name: 'category', params: {category_id: category.url} }">

							<div class = "card-header">

								<h2 class = "card-title">{{ category.category }}</h2>

							</div>

							<div class = "card-body">

								<img src = "img/categories.png" class = "img-fluid">

							</div>

						</router-link>

					</div>

				</div>

			</div>

			<div v-else>

				<h1>Categorías sin registrar</h1>

			</div>

		</div>

	</template>

	<script>

		export default {

			data() {

				return {

					categories: ''

				}

			},

			created() {

				this.apiCategories();

			},

			methods: {

				apiCategories() {

					fetch('/api/categories')
					.then(response => response.json())
					.then(json => this.categories = json.data)

				}

			}

		}

	</script>

