

	@extends("admin")

	@section("title", "Actualizar Usuario")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Actualizar Usuario</h2>

		<div class = "spacing-1"></div>

		<form method = "post" action = "{{ route('user.update', $user->id) }}">
		@method("put")
		@csrf

			<div class = "form-group row">
				
				<label for = "name" class = "col-md-2 col-form-label">Nombres:</label>

				<div class = "col-md-4">
					
					<input type = "text" name = "name" id = "name" class = "form-control" value = "{{ $user->name }}">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("name") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "surname" class = "col-md-2 col-form-label">Apellidos:</label>

				<div class = "col-md-4">
					
					<input type = "text" name = "surname" id = "surname" class = "form-control" value = "{{ $user->surname }}">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("surname") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "email" class = "col-md-2 col-form-label">Correo Electrónico:</label>

				<div class = "col-md-4">
					
					<input type = "email" name = "email" id = "email" class = "form-control" value = "{{ $user->email }}">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("email") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "spacing-1"></div>

			<button type = "submit" class = "btn btn-primary float-right">Actualizar</button>

		</form>

	@endsection
	
