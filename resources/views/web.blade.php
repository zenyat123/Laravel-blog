<!DOCTYPE html>

<html>

<head>

	<meta charset = "utf-8">
	<title>@yield("title", "Web")</title>

	<link href = "{{ asset('css/app.css') }}" rel = "stylesheet">

</head>

<body>

	<div id = "app">

		@include("web/others/navbar")

		<div class = "container">

			@yield("content")

		</div>

		@include("web/others/footer")

	</div>

	<script src = "{{ asset('js/app.js') }}"></script>
	
</body>

</html>