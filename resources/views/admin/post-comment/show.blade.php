

	<form>
		
		<div class = "form-group">
			
			<label class = "col-12 col-form-label">Título:</label>

			<div class = "col-12">
				
				<input type = "text" class = "form-control" value = "{{ $post_comment->title }}" readonly>

			</div>

		</div>

		<div class = "form-group">
			
			<label class = "col-12 col-form-label">Usuario:</label>

			<div class = "col-12">
				
				<input type = "text" class = "form-control" value = "{{ $post_comment->user->name }} {{ $post_comment->user->surname }}" readonly>

			</div>

		</div>

		<div class = "form-group">
			
			<label class = "col-12 col-form-label">Estado:</label>

			<div class = "col-12">
				
				@if($post_comment->approved == 1)

					<span class = "badge-lg badge-success ml-3">Aprobado</span>

				@else

					<span class = "badge-lg badge-secondary ml-3">Desaprobado</span>

				@endif

			</div>

		</div>

		<div class = "form-group">
			
			<label class = "col-12 col-form-label">Comentarios:</label>

			<div class = "col-12">
				
				<textarea class = "form-control" rows = "9" readonly>{{ $post_comment->comment }}</textarea>

			</div>

		</div>

	</form>	

