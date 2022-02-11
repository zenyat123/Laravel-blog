

	@extends("admin")

	@section("title", "Post")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Post</h2>

		<div class = "spacing-1"></div>

		<form action = "{{ route('post.index') }}" method = "get" class = "form-inline mb-2 float-right">
			
			<select name = "order" class = "form-control mr-2">
				
				<option value = "asc">Ascendente</option>
				<option value = "desc" {{ request("order") == "desc" ? "selected" : "" }}>Descendente</option>

			</select>

			<input type = "text" name = "search" value = "{{ request('search') }}" class = "form-control mr-2" placeholder = "Buscar...">	

			<button type = "submit" class = "btn btn-outline-primary">Buscar</button>

		</form>
		
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

							<a href = "{{ route('post.show', $post->url) }}" class = "btn btn-primary"><i class = "fa fa-search"></i></a>
							
							<a href = "{{ route('post.edit', $post->url) }}" class = "btn btn-warning"><i class = "fa fa-pencil-square-o"></i></a>

							<a href = "{{ route('post-comments', $post->url) }}" class = "btn btn-info"><i class = "fa fa-comments-o"></i></a>
							
							<button class = "btn btn-danger" data-toggle = "modal" data-target = "#modalDelete" data-id = "{{ $post->url }}">

								<i class = "fa fa-close"></i>

							</button>

						</div>

					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

		{{

			$posts->appends([

				"order" => request("order"),
				"search" => request("search")

		  	])->links()

		}}

		<a href = "{{ route('post.create') }}" class = "btn btn-primary float-right mt-2 mb-2">Crear Post</a>

		@include("admin/others/modals/modalspost")

	@endsection

