

	@extends("admin")

	@section("title", "Consultar contacto")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Consultar contacto</h2>

		<div class = "spacing-1"></div>

		<form>
			
			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Nombres:</label>

				<div class = "col-md-4">
					
					<input type = "text" class = "form-control" value = "{{ $contact->names }}" readonly>

				</div>

			</div>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Correo electrónico:</label>

				<div class = "col-md-4">
					
					<input type = "text" class = "form-control" value = "{{ $contact->email }}" readonly>

				</div>

			</div>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Mensaje:</label>

				<div class = "col-md-9">

					<textarea class = "form-control" rows = "9" readonly>{{ $contact->message }}</textarea>

				</div>

			</div>

			<div class = "spacing-1"></div>

			<a href = "{{ route('contact.index') }}" class = "btn btn-info float-right">Volver</a>

		</form>

	@endsection

