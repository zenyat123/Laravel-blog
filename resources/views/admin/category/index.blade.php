

	@extends("admin")

	@section("title", "Categorías")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Categorías</h2>

		<div class = "spacing-1"></div>

		<table class = "table table-bordered">
			
			<thead>
				
				<tr>
					
					<th>Id</th>
					<th>Categoría</th>
					<th>Url</th>
					<th>Creada</th>
					<th>Actualizada</th>
					<th>Acciones</th>

				</tr>

			</thead>

			<tbody>

				@foreach($categories as $category)

				<tr>
					
					<td>{{ $category->id }}</td>
					<td>{{ $category->category }}</td>
					<td>{{ $category->url }}</td>
					<td>{{ $category->created_at->format("d/m/Y") }}</td>
					<td>{{ $category->updated_at->format("d/m/Y") }}</td>
					<td>
						
						<div class = "btn-group" role = "group">
							
							<a href = "{{ route('category.show', $category->id) }}" class = "btn btn-primary"><i class = "fa fa-search"></i></a>

							<a href = "{{ route('category.edit', $category->id) }}" class = "btn btn-warning"><i class = "fa fa-pencil-square-o"></i></a>

							<button class = "btn btn-danger" data-toggle = "modal" data-target = "#modalDelete" 
							                                 data-id = "{{ $category->id }}" data-category = "{{ $category->category }}">
								
								<i class = "fa fa-close"></i>

							</button>

						</div>

					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

		{{ $categories->links() }}

		<a href = "{{ route('category.create') }}" class = "btn btn-primary float-right mt-2 mb-2">Crear Categoría</a>

		@include("admin/other/modals/modalscategory")

	@endsection

