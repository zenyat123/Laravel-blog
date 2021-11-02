

	@extends("admin")

	@section("title", "Comentarios de Post")

	@section("content")

		@if(count($post_comments) > 0)

			<h2 class = "text-primary text-center mt-2">Comentarios de Post</h2>

			<div class = "spacing-1"></div>

			<table class = "table table-bordered">
				
				<thead>
					
					<tr>
						
						<th>Id</th>
						<th>Título</th>
						<th>Comentario</th>
						<th>Usuario</th>
						<th>Creado</th>
						<th>Actualizado</th>
						<th>Acciones</th>

					</tr>

				</thead>

				<tbody>

					@foreach($post_comments as $post_comment)
					
					<tr>
						
						<td>{{ $post_comment->id }}</td>
						<td>{{ $post_comment->title }}</td>
						<td>{{ $post_comment->comment }}</td>
						<td>{{ $post_comment->user->name }}  {{ $post_comment->user->surname }}</td>
						<td>{{ $post_comment->created_at->format("d/m/Y") }}</td>
						<td>{{ $post_comment->updated_at->format("d/m/Y") }}</td>

						<td>
							
							<div class = "btn-group" role = "group">																

								<button class = "btn btn-primary" data-toggle = "modal" data-target = "#modalShow" data-id = "{{ $post_comment->id }}">

									<i class = "fa fa-search"></i>

								</button>	

								<button class = "btn btn-{{ $post_comment->approved == 1 ? 'success' : 'secondary' }} status" comment-id = "{{ $post_comment->id }}">

									{!! $post_comment->approved == 1 ? "<i class = 'fa fa-thumbs-o-up'></i>" : "<i class = 'fa fa-thumbs-o-down'></i>" !!}

								</button>			 

								<button class = "btn btn-danger" data-toggle = "modal" data-target = "#modalDelete" data-id = "{{ $post_comment->id }}">
									
									<i class = "fa fa-close"></i>

								</button>

							</div>

						</td>

					</tr>

					@endforeach

				</tbody>

			</table>

			@include("admin/other/modals/modalspostcomment")

		@else

			<div class = "spacing-2"></div>

			<h1 class = "text-secondary text-center">Uppss! no hay comentarios para el post seleccionado</h1>

			<div class = "spacing-2"></div>

			<a href = "{{ route('post.index') }}" class = "btn btn-info float-right">Volver</a>

		@endif

	@endsection

	