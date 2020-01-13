

	<nav class = "navbar navbar-expand-lg navbar-light" id = "app">
		
		<a href = "{{ route('admin') }}" class = "navbar-brand">Laravel</a>

		<button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#menuSuperior" 
				aria-controls = "menuSuperior" aria-expanded = "false" aria-label = "Toggle navigation">
	    	
	    	<span class="navbar-toggler-icon"></span>

	  	</button>

		<div class = "collapse navbar-collapse" id = "menuSuperior">
			
			<ul class = "navbar-nav mr-auto">			

				<li class = "nav-item dropdown">
					
					<a href = "#" class = "nav-link dropdown-toggle" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
						
						Componentes	

					</a>
	
					<div class = "dropdown-menu"> 
											
						<a href = "{{ route('user.index') }}" class = "dropdown-item">Usuarios</a>	
						<a href = "{{ route('category.index') }}" class = "dropdown-item">Categorías</a>
						<a href = "{{ route('post.index') }}" class = "dropdown-item">Posts</a>
						<a href = "{{ route('post-comment.index') }}" class = "dropdown-item">Comentarios</a>
						<a href = "{{ route('contact.index') }}" class = "dropdown-item">Contactos</a>
						<a href = "{{ route('web') }}" class = "dropdown-item">Web</a>

					</div>

				</li>

			</ul>

			<ul class = "navbar-nav">

				<li class = "nav-item dropdown">
					
					<a href = "#" class = "nav-link dropdown-toggle" role = "button" data-toggle = "dropdown">

						{{ Auth::user()->name }} {{ Auth::user()->surname }}

					</a>

					<div class = "dropdown-menu dropdown-menu-right">
						
						<a href = "{{ route('admin') }}" class = "dropdown-item">Perfil</a>
						<a href = "{{ route('home') }}" class = "dropdown-item">Configuración</a>

						<a href = "{{ route('logout') }}" class = "dropdown-item" 
						   onclick = "event.preventDefault(); document.getElementById('logout-form').submit();">
                           
                            {{ __('Logout') }}

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

					</div>

				</li>

			</ul>

		</div>

	</nav>

