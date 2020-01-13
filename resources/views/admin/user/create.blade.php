

	@extends("admin")

	@section("title", "Registrar Usuario")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Registrar Usuario</h2>

		<div class = "spacing-1"></div>

		<form method = "post" action = "{{ route('user.store') }}">
		@csrf

			<div class = "form-group row">
				
				<label for = "name" class = "col-md-2 col-form-label">Nombres:</label>

				<div class = "col-md-4">
					
					<input type = "text" name = "name" id = "name" class = "form-control">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("name") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "surname" class = "col-md-2 col-form-label">Apellidos:</label>

				<div class = "col-md-4">
					
					<input type = "text" name = "surname" id = "surname" class = "form-control">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("surname") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "email" class = "col-md-2 col-form-label">Correo Electrónico:</label>

				<div class = "col-md-4">
					
					<input type = "email" name = "email" id = "email" class = "form-control">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("email") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "password" class = "col-md-2 col-form-label">Contraseña:</label>

				<div class = "col-md-4">
					
					<input type = "password" name = "password" id = "password" class = "form-control">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("password") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "spacing-1"></div>

			<button type = "submit" class = "btn btn-primary float-right">Registrar</button>

		</form>

	@endsection
	
