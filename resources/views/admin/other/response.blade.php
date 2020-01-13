

	@if(session("response"))

		<div class = "alert alert-success alert-dismissible fade show col-md-4 mx-auto" role = "alert">			

			<button type = "button" class = "close" data-dismiss = "alert" aria-label = "close"><span aria-hidden = "true">&times;</span></button>

			{{ session("response") }}

		</div>

	@endif

	