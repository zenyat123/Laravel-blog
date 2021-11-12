

	<p>{{ $post_comment->title }}</p>

	<p>{{ $post_comment->user->name }} {{ $post_comment->user->surname }}</p>

	@if($post_comment->approved == 1)

		<span class = "badge badge-success">Aprobado</span>

	@else

		<span class = "badge badge-secondary">Desaprobado</span>

	@endif

	<p>

		{{ $post_comment->comment }}

	</p>

