

	@extends("admin")

	@section("title", "Registrar Categoría")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Registrar Categoría</h2>

		<div class = "spacing-1"></div>

		<form method = "post" action = "{{ route('category.store') }}">
		@csrf

			<div class = "form-group row">
				
				<label for = "category" class = "col-md-2 col-form-label">Categoría:</label>

				<div class = "col-md-4">
					
					<input type = "text" name = "category" id = "category" class = "form-control" value = "{{ old('category') }}">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("category") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>	

			<div class = "form-group row">
				
				<label for = "url" class = "col-md-2 col-form-label">Url:</label>

				<div class = "col-md-4">

					<input type = "text" name = "url" id = "url" class = "form-control" value = "{{ old('url') }}">

				</div>

				<div class = "col-md-6 mt-2">
					
					@error("url") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "spacing-1"></div>

			<button type = "submit" class = "btn btn-primary float-right">Registrar</button>

		</form>

	@endsection

