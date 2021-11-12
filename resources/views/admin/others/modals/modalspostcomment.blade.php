

	<div class = "modal fade" role = "dialog" id = "modalShow">
		
		<div class = "modal-dialog" role = "document">
			
			<div class = "modal-content">
				
				<div class = "modal-header">
					
					<h5 class = "modal-title">Comentario</h5>

					<button class = "close" data-dismiss = "modal" aria-label = "close">
						
						<span aria-hidden = "true">&times;</span>

					</button>

				</div>

				<div class = "modal-body">
					
					<p id = "comment"></p>

				</div>

				<div class = "modal-footer">
					
					<button class = "btn btn-secondary" data-dismiss = "modal">Cerrar</button>

				</div>

			</div>

		</div>

	</div>

	<div class = "modal fade" role = "dialog" id = "modalDelete">
		
		<div class = "modal-dialog" role = "document">
			
			<div class = "modal-content">
				
				<div class = "modal-header">					

					<h5 class = "modal-title">Atención</h5>

					<button class = "close" data-dismiss = "modal" aria-label = "close">
						
						<span aria-hidden = "true">&times;</span>

					</button>

				</div>

				<div class = "modal-body">

					

				</div>

				<div class = "modal-footer">
					
					<button class = "btn btn-secondary" data-dismiss = "modal">Cerrar</button>

					<form method = "post" action = "" data-action = "{{ route('post-comment.destroy', 0) }}" id = "formDelete">
					@method("delete")
					@csrf

						<button type = "submit" class = "btn btn-danger">Eliminar</button>

					</form>

				</div>

			</div>

		</div>

	</div>

	<script>

		window.onload = function()
		{	

			//  Acciones del botón para cambiar estado en aprobación de comentarios

			$('.status').click(function(){

				button = $(this);
				id = $(this).attr('comment-id');				

				$.ajax({

					method: 'POST',
					url: '{{ URL::to("/") }}/admin/post-comment/status/' + id,
					data: { '_token': '{{ csrf_token() }}' }

				})
				.done(function(status){

					if(status == 1){

						$(button).addClass('btn-success');
						$(button).removeClass('btn-secondary');
						$(button).html('<i class = "fa fa-thumbs-o-up"></i>');
						
					}else{

						$(button).addClass('btn-secondary');
						$(button).removeClass('btn-success');
						$(button).html('<i class = "fa fa-thumbs-o-down"></i>');
						
					}

				})

			})

			//  Modals

			$('#modalShow').on('show.bs.modal', function(event){

				var button = $(event.relatedTarget);

				var id = button.data('id');

				var modal = $(this);

				$.ajax({

					method: 'GET',
					url: '{{ URL::to("/") }}/admin/post-comment/show/' + id

				})
				.done(function(response){

					modal.find('#comment').html(response);

				})

			})

			$('#modalDelete').on('show.bs.modal', function(event){

				var button = $(event.relatedTarget); // Button that triggered the modal

				var id = button.data('id'); // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

				var url = $('#formDelete').attr('data-action').slice(0,-1);

				$('#formDelete').attr('action', url + id);

				var modal = $(this);
				
				modal.find('.modal-body').text('Confirma la eliminación del comentario con id: ' + id);

			})

		}

	</script>

