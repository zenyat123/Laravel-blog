

	@extends("admin")

	@section("title", "Usuarios")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Usuarios</h2>

		<div class = "spacing-1"></div>

		<table class = "table table-bordered">
			
			<thead>
				
				<tr>
					
					<th>Id</th>
					<th>Nombres</th>
					<th>Correo Electrónico</th>
					<th>Permisos</th>
					<th>Creación</th>
					<th>Actualización</th>
					<th>Acciones</th>

				</tr>

			</thead>

			<tbody>
				
				@foreach($users as $user)

					<tr>
						
  						<td>{{ $user->id }}</td>
  						<td>{{ $user->name }} {{ $user->surname }}</td>
  						<td>{{ $user->email }}</td>
  						<td>{{ $user->rol->name }}</td>
  						<td>{{ $user->created_at->format("d/m/Y") }}</td>
  						<td>{{ $user->updated_at->format("d/m/Y") }}</td>
  						<td>
  							
							<div class = "btn-group" role = "group">
								
								<a href = "{{ route('user.show', $user->id) }}" class = "btn btn-primary"><i class = "fa fa-search"></i></a>

								<a href = "{{ route('user.edit', $user->id) }}" class = "btn btn-warning"><i class = "fa fa-pencil-square-o"></i></a>

								<button class = "btn btn-danger" data-toggle = "modal" data-target = "#modalDelete" data-id = "{{ $user->id }}" 
									                             data-name = "{{ $user->name }}" data-surname = "{{ $user->surname }}">
								
									<i class = "fa fa-close"></i>

								</button>

							</div>

  						</td>

					</tr>

				@endforeach

			</tbody>

		</table>

		<a href = "{{ route('user.create') }}" class = "btn btn-primary float-right mt-2 mb-2">Crear Usuario</a>

		@include("admin/others/modals/modalsuser")

	@endsection
	
