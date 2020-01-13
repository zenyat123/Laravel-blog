

	@extends("admin")

	@section("title", "Contactos")

	@section("content")

		<h2 class = "text-primary text-center mt-2">Contactos</h2>

		<div class = "spacing-1"></div>

		<table class = "table table-bordered">
			
			<thead>
				
				<tr>
					
					<th>Id</th>
					<th>Nombres</th>
					<th>Correo electrónico</th>
					<th>Mensaje</th>
					<th>Creado</th>
					<th>Actualizado</th>
					<th>Acciones</th>	

				</tr>

			</thead>

			<tbody>

				@foreach($contacts as $contact)
				
				<tr>
					
					<td>{{ $contact->id }}</td>
					<td>{{ $contact->names }}</td>
					<td>{{ $contact->email }}</td>
					<td>{{ $contact->message }}</td>
					<td>{{ $contact->created_at->format("d/m/Y") }}</td>
					<td>{{ $contact->updated_at->format("d/m/Y") }}</td>
					<td>
						
						<div class = "btn-group" role = "group">
							
							<a href = "{{ route('contact.show', $contact->id) }}" class = "btn btn-primary"><i class = "fa fa-search"></i></a>							 

							<button class = "btn btn-danger" data-toggle = "modal" data-target = "#modalDelete" 
							                                 data-id = "{{ $contact->id }}">
								
								<i class = "fa fa-close"></i>

							</button>

						</div>

					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

		@include("admin/other/modals/modalscontact")

	@endsection

