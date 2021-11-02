

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

			<div class = "form-group row">
					
				<div class = "col-md-8">
					
					<label>Contenido:</label>

					<span class = "form-control-lg">{!! $post->content !!}</span>

				</div>

				<div class = "col-md-4">

					@if($post->image)

						<img src = "/img/posts/{{ $post->image }}" class = "img-thumbnail w-100">

					@endif
					
				</div>

			</div>

			<div class = "spacing-1"></div>

			<a href = "{{ route('post.index') }}" class = "btn btn-info float-right">Volver</a>

		</form>

	@endsection

