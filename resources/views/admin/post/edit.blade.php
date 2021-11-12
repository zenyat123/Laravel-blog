
	
	@extends("admin")

	@section("title", "Actualizar Post")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Actualizar Post</h2>

		<div class = "spacing-1"></div>

		<form method = "post" action = "{{ route('post.update', $post->id) }}" enctype = "multipart/form-data">
		@method("put")
		@csrf

			<div class = "form-group row">
				
				<label for = "title" class = "col-md-2 col-form-label">Título:</label>

				<div class = "col-md-6">

					<input type = "text" name = "title" id = "title" class = "form-control" value = "{{ $post->title }}">

				</div>

				<div class = "col-md-4 mt-2">
					
					@error("title") <span class = "text-danger">{{ $message }}</span> @enderror

				</div>

			</div>

			<div class = "form-group row">
				
				<label for = "category_id" class = "col-md-2 col-form-label">Categoría:</label>

				<div class = "col-md-4">
	
					<select name = "category_id" id = "category_id" class = "form-control">
						
						@foreach($categories as $category => $id)

							<option {{ $post->category_id == $id ? "selected" : "" }} value = "{{ $id }}">{{ $category }}</option>

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

							<option value = "{{ $id }}" {{ in_array($id, old("tags_id") ?  : $post->tags->pluck("id")->toArray()) ? "selected" : "" }}>{{ $tag }}</option>

						@endforeach

					</select>

				</div>
				
				<label for = "posted" class = "col-md-2 col-form-label">Publicar:</label>

				<div class = "col-md-4">
					
					<select name = "posted" id = "posted" class = "form-control">
						
						@include("admin/others/optionyesnot", ["value" => $post->posted])

					</select>

				</div>

			</div>

			<div class = "form-group">
				
				<label for = "content">Contenido:</label>

				<textarea name = "content" id = "content" rows = "10" class = "form-control">{{ $post->content }}</textarea>

				@error("content") <span class = "text-danger">{{ $message }}</span> @enderror

			</div>

			<button type = "submit" class = "btn btn-primary float-right">Actualizar</button>

		</form>

	@endsection

