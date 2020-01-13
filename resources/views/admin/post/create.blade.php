

	@extends("admin")

	@section("title", "Registrar Post")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Registrar Post</h2>

		<div class = "spacing-1"></div>

		<form method = "post" action = "{{ route('post.store') }}" enctype = "multipart/form-data">
		@csrf

			<div class = "form-group row">
				
				<label for = "title" class = "col-md-2 col-form-label">Título:</label>

				<div class = "col-md-6">

					<input type = "text" name = "title" id = "title" class = "form-control" value = "{{ old('title') }}">

				</div>

				<div class = "col-md-4 mt-2">
					
					@error("title") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "url" class = "col-md-2 col-form-label">Url:</label>

				<div class = "col-md-6">

					<input type = "text" name = "url" id = "url" class = "form-control" value = "{{ old('url') }}">

				</div>

				<div class = "col-md-4 mt-2">
					
					@error("url") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "category_id" class = "col-md-2 col-form-label">Categoría:</label>

				<div class = "col-md-4">
					
					<select name = "category_id" id = "category_id" class = "form-control">
						
						@foreach($categories as $category => $id)

							<option value = "{{ $id }}">{{ $category }}</option>

						@endforeach
	
					</select>

				</div>

				<label class = "col-md-2 col-form-label">Imagen:</label>

				<div class = "col-md-4">
				
					<input type = "file" name = "image" class = "form-control">
	
				</div>

			</div>

			<div class = "form-group row">

				<label for = "tags_id" class = "col-md-2 col-form-label">Etiquetas:</label>

				<div class = "col-md-4">
					
					<select name = "tags_id[]" id = "tags_id" class = "form-control" multiple>
						
						@foreach($tags as $tag => $id)

							<option value = "{{ $id }}" {{ in_array($id, old("tags_id") ?  : []) ? "selected" : "" }}>{{ $tag }}</option>

						@endforeach

					</select>

				</div>
				
				<label for = "posted" class = "col-md-2 col-form-label">Publicar:</label>

				<div class = "col-md-4">
					
					<select name = "posted" id = "posted" class = "form-control">
						
						@include("admin/other/optionyesnot", ["value" => ""])

					</select>

				</div>

			</div>

			<div class = "form-group">
				
				<label for = "content">Contenido:</label>

				<textarea name = "content" id = "content" rows = "10" class = "form-control">{{ old("content") }}</textarea>

				@error("content") <span class = "text-danger">{{ $message }}</span> @enderror

			</div>

			<div class = "spacing-1"></div>

			<input type = "hidden" id = "token" value = "{{ csrf_token() }}">

			<button type = "submit" class = "btn btn-primary float-right">Registrar</button>

		</form>

	@endsection

