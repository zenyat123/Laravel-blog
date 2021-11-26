

	<template>

		<div class = "modal fade" role = "dialog" id = "modalPost">
		
			<div class = "modal-dialog" role = "document">
				
				<div class = "modal-content">
					
					<div class = "modal-header">					

						<h5 class = "modal-title">{{ getPost.title }}</h5>

						<button class = "close" data-dismiss = "modal" aria-label = "close">
							
							<span aria-hidden = "true">&times;</span>

						</button>

					</div>

					<div class = "modal-body">

						<span v-html = "getPost.content"></span>

					</div>

					<div class = "modal-footer" v-if = "getPost">
						
						<button class = "btn btn-secondary" data-dismiss = "modal">Cerrar</button>

						<router-link v-bind:to = "{ name: 'post', params: {post_id: getPost.url} }" class = "btn btn-success" data-dismiss = "modal">

							Ver completo

						</router-link>

					</div>

				</div>

			</div>

		</div>

	</template>

	<script>

		export default {

			props: ['getPost'],
			watch: {

				getPost: function() {

					$('#modalPost').modal('show');

				}

			}

		}

	</script>

