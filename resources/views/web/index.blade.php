

	@extends("web")

	@section("title", "Web")

	@section("content")

		<h3 class = "title">

			<router-link to = "/">@{{ title }}</router-link>

		</h3>

		<div class = "spacing-1"></div>

		<router-view></router-view>

	@endsection
	
