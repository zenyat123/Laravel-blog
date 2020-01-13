

	<template>

		<form>

			<div class = "row">

				<div class = "offset-md-2 col-md-8">

					<div class = "card">

						<div class = "card-header">

							Contacto

						</div>

						<div class = "card-body">

							<div class = "input-group">

								<div class = "input-group-prepend">

									<span class = "input-group-text">Nombres</span>

								</div>

								<input type = "text" v-model = "names" class = "form-control">

							</div>

							<div class = "input-group mt-2">

								<div class = "input-group-prepend">

									<span class = "input-group-text">Correo electrónico</span>

								</div>

								<input type = "email" v-model = "email" class = "form-control">

							</div>

							<div class = "input-group mt-2">

								<div class = "input-group-prepend">

									<span class = "input-group-text">Mensaje</span>

								</div>

								<textarea v-model = "message" class = "form-control"></textarea>

							</div>
							
							<button v-on:click = "saveContact" class = "btn btn-primary mt-4 float-right">Enviar</button>						 

						</div>

					</div>

				</div>

			</div>

		</form>

	</template>

	<script>

		export default {

			data() {

				return {

					names: '',
					email: '',
					message: ''

				}

			},

			methods: {

				saveContact(event) {

					event.preventDefault();

					axios.post('/sendcontact', {

						names: this.names,
						email: this.email,
						message: this.message

					})

					this.$router.push('/');

				}

			}

		}

	</script>

