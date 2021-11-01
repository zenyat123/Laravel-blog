

	<nav class = "navbar navbar-expand-lg navbar-light menu">

		@if(Auth::user() && Auth::user()->rol_id == 1)

			<a href = "{{ route('admin') }}" class = "navbar-brand">Laravel</a>

		@else

			<router-link to = "/" class = "navbar-brand">

				Vue

			</router-link>

		@endif 
		
		<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#menuSuperior" 
				aria-controls = "menuSuperior" aria-expanded = "false" aria-label = "Toggle navigation">
	    	
	    	<span class="navbar-toggler-icon"></span>

	  	</button>

		<div class = "collapse navbar-collapse" id = "menuSuperior">
			
			<ul class = "navbar-nav mr-auto">			

				<li class = "nav-item">
					
					<router-link v-bind:to = "{ name: 'categories' }" class = "nav-link text-white">Categorías</router-link>

				</li>

				<li class = "nav-item">

					<router-link to = "/" class = "nav-link text-white">Publicaciones</router-link>

				</li>

			</ul>

			<ul class = "navbar-nav">

				@auth

					<li class = "nav-item dropdown">
			
						<a href = "#" class = "nav-link dropdown-toggle" role = "button" data-toggle = "dropdown">

							{{ Auth::user()->name }} {{ Auth::user()->surname }}

						</a>

						<div class = "dropdown-menu dropdown-menu-right">
					
							<a href = "#" class = "dropdown-item">Perfil</a>
							<a href = "#" class = "dropdown-item">Configuración</a>

							<a href = "{{ route('logout') }}" class = "dropdown-item" 
							   onclick = "event.preventDefault(); document.getElementById('logout-form').submit();">
	                           
	                            {{ __('Logout') }}

	                        </a>

	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            @csrf
	                        </form>

						</div>

					</li>

				@else

					<li class="nav-item">

                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                    </li>

                    @if (Route::has('register'))

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            
                        </li>

                    @endif

				@endauth

			</ul>

		</div>

	</nav>

