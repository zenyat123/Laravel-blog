

	@extends("admin")

	@section("title", "Post")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Post</h2>

		<div class = "spacing-1"></div>
		
		<table class = "table table-bordered">
			
			<thead>
				
				<tr>
					
					<th>Id</th>
					<th>Título</th>
					<th>Url</th>
					<th>Publicado</th>
					<th>Creado</th>
					<th>Actualizado</th>
					<th>Categoría</th>
					<th>Acciones</th>

				</tr>

			</thead>

			<tbody>

				@foreach($posts as $post)
				
				<tr>
					
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->url }}</td>
					<td>{{ $post->posted }}</td>
					<td>{{ $post->created_at->format("d/m/Y") }}</td>
					<td>{{ $post->updated_at->format("d/m/Y") }}</td>
					<td>{{ $post->category->category }}</td>
					<td>
						
						<div class = "btn-group" role = "group">

							<a href = "{{ route('post.show', $post->id) }}" class = "btn btn-primary"><i class = "fa fa-search"></i></a>
							
							<a href = "{{ route('post.edit', $post->id) }}" class = "btn btn-warning"><i class = "fa fa-pencil-square-o"></i></a>

							<a href = "{{ route('post-comments', $post->id) }}" class = "btn btn-info"><i class = "fa fa-comments-o"></i></a>
							
							<button class = "btn btn-danger" data-toggle = "modal" data-target = "#modalDelete" data-id = "{{ $post->id }}">

								<i class = "fa fa-close"></i>

							</button>

						</div>

					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

		{{ $posts->links() }}

		<a href = "{{ route('post.create') }}" class = "btn btn-primary float-right mt-2 mb-2">Crear Post</a>

		@include("admin/other/modals/modalspost")

	@endsection

