

@extends('layouts.app')

@section('content')

<div class = "container">

    <div class = "row justify-content-center">

        <div class = "col-md-12">

            <div class = "card">

                <div class = "card-header">

                    Panel de Control

                </div>

                <div class = "card-body">

                    @if (session('status'))

                        <div class = "alert alert-success" role = "alert">
                            
                            {{ session('status') }}

                        </div>

                    @endif

                    <div class = "row">

                        <div class = "col-md-6">

                            <a href = "{{ route('user.index') }}" class = "dropdown-item"><i class = "fa fa-users"></i> Usuarios</a>  
                            <a href = "{{ route('category.index') }}" class = "dropdown-item"><i class = "fa fa-sitemap"></i> Categorías</a>
                            <a href = "{{ route('post.index') }}" class = "dropdown-item"><i class = "fa fa-smile-o"></i> Posts</a>
                            <a href = "{{ route('post-comment.index') }}" class = "dropdown-item"><i class = "fa fa-comments-o"></i> Comentarios</a>                            

                        </div>

                        <div class = "col-md-6">
                            
                            <a href = "{{ route('web') }}" class = "dropdown-item"><i class = "fa fa-ravelry"></i> Web</a>
                            <a href = "{{ route('user.index') }}" class = "dropdown-item"><i class = "fa fa-superpowers"></i> Componentes</a>
                            <a href = "#" class = "dropdown-item"><i class = "fa fa-indent"></i> Api</a>
                            <a href = "{{ route('contact.index') }}" class = "dropdown-item"><i class = "fa fa-handshake-o"></i> Contactos</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

