

	<footer>

		<div>

			<router-link to = "/" class = "text-white">	

				&copy; Blog Web {{ date("Y") }}

			</router-link>

			/

			<router-link v-bind:to = "{ name: 'contact' }" class = "text-white">

				Contacto

			</router-link>

		</div>

	</footer>

