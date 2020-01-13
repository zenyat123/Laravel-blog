<!DOCTYPE html>

<html>

<head>

	<meta charset = "utf-8">
	<title>@yield("title", "Administrador")</title>

	<link href = "{{ asset('css/app.css') }}" rel = "stylesheet">

</head>

<body>

	@include("admin/other/navbar")

	<div class = "container">

		@yield("content")

		@include("admin/other/response")

	</div>

	<script src = "{{ asset('js/app.js') }}"></script>
	
</body>

</html>