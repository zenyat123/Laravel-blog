

	@extends("admin")

	@section("title", "Consultar Usuario")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Consultar Usuario</h2>

		<div class = "spacing-1"></div>

		<form>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Nombres:</label>

				<div class = "col-md-4">
					
					<input type = "text" class = "form-control" value = "{{ $user->name }}" readonly>

				</div>

			</div>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Apellidos:</label>

				<div class = "col-md-4">
					
					<input type = "text" class = "form-control" value = "{{ $user->surname }}" readonly>

				</div>

			</div>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Correo Electrónico:</label>

				<div class = "col-md-4">
					
					<input type = "email" class = "form-control" value = "{{ $user->email }}" readonly>

				</div>

			</div>

			<div class = "spacing-1"></div>

			<a href = "{{ route('user.index') }}" class = "btn btn-info float-right">Volver</a>

		</form>

	@endsection
	
