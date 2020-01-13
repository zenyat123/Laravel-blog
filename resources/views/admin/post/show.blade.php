

	@extends("admin")

	@section("title", "Consultar Post")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Consultar Post</h2>

		<div class = "spacing-1"></div>

		<form>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Título:</label>

				<div class = "col-md-6">

					<input type = "text" class = "form-control" value = "{{ $post->title }}" readonly>

				</div>

			</div>

			<div class = "form-group row">
				
				<label class = "col-md-2 col-form-label">Url:</label>

				<div class = "col-md-6">

					<input type = "text" class = "form-control" value = "{{ $post->url }}" readonly>

				</div>

			</div>

			<div class = "form-group">
				
				<label>Contenido:</label>

				<textarea class = "form-control" rows = "12" readonly>{{ $post->content }}</textarea>

			</div>

			<div class = "spacing-1"></div>

			<a href = "{{ route('post.index') }}" class = "btn btn-info float-right">Volver</a>

		</form>

	@endsection

