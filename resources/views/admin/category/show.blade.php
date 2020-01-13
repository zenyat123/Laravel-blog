

	@extends("admin")

	@section("title", "Consultar Categoría")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Consultar Categoría</h2>

		<div class = "spacing-1"></div>

		<form>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Categoría</label>

				<div class = "col-md-4">
					
					<input type = "text" class = "form-control" value = "{{ $category->category }}" readonly>

				</div>

			</div>	

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Url:</label>

				<div class = "col-md-4">

					<input type = "text" class = "form-control" value = "{{ $category->url }}" readonly>

				</div>

			</div>

			<div class = "spacing-1"></div>

			<a href = "{{ route('category.index') }}" class = "btn btn-info float-right">Volver</a>

		</form>

	@endsection

