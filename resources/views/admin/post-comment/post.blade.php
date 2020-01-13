

	@extends("admin")

	@section("title", "Comentarios de Post")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Comentarios de Post</h2>

		<div class = "spacing-1"></div>

		<form action = "{{ route('post-comments', 1) }}" id = "formFilterPost">

			<div class = "form-row mb-3">

				<label for = "filterPost" class = "col-md-1 col-form-label">Posts:</label>

				<div class = "col-md-6">

					<select id = "filterPost" class = "form-control">
						
						@foreach($posts as $p)
				
							<option value = "{{ $p->id }}" {{ $post->id == $p->id ? "selected" : "" }}>

								{{ Str::limit($p->title, 80) }}

							</option>

						@endforeach

					</select>

				</div>

				<div class = "col-md-2">
					
					<button type = "submit" class = "btn btn-info"><i class = "fa fa-search"></i></button>

				</div>

			</div>

		</form>

		@if(count($post_comments) > 0)

			<table class = "table table-bordered">
				
				<thead>
					
					<tr>
						
						<th>Id</th>
						<th>Título</th>
						<th>Comentario</th>
						<th>Estado</th>
						<th>Usuario</th>
						<th>Creado</th>
						<th>Actualizado</th>

					</tr>

				</thead>

				<tbody>

					@foreach($post_comments as $post_comment)
					
					<tr>
						
						<td>{{ $post_comment->id }}</td>
						<td>{{ $post_comment->title }}</td>
						<td>{{ $post_comment->comment }}</td>

						<td>

							@if($post_comment->approved == 1)

								<span class = "badge badge-success">Aprobado</span>

							@else

								<span class = "badge badge-secondary">Desaprobado</span>

							@endif

						</td>

						<td>{{ $post_comment->user->name }}  {{ $post_comment->user->surname }}</td>
						<td>{{ $post_comment->created_at->format("d/m/Y") }}</td>
						<td>{{ $post_comment->updated_at->format("d/m/Y") }}</td>

					</tr>

					@endforeach

				</tbody>

			</table>

			<div class = "spacing-1"></div>

			<a href = "{{ route('post.index') }}" class = "btn btn-info float-right">Volver</a>

		@else

			<div class = "spacing-1"></div>

			<h1 class = "text-secondary text-center">Uppss! no hay comentarios para el post seleccionado</h1>

			<div class = "spacing-2"></div>

			<a href = "{{ route('post.index') }}" class = "btn btn-info float-right">Volver</a>

		@endif

		<script>

			window.onload = function(){

				$('#formFilterPost').submit(function(){

					var action = $('#formFilterPost').attr('action');

					action = action.replace(/[0-9]/g, $('#filterPost').val());

					$('#formFilterPost').attr('action', action);

				})

			}

		</script>

	@endsection

