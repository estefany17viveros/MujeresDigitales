@extends('layout')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="display-4">Bienvenido al Sistema de Eventos 🇨🇴</h1>
    <p class="lead">Gestiona Eventos, Artistas, Localidades y Boletas desde aquí.</p>
    
    <div class="mt-4">
        <a href="{{ route('eventos.index') }}" class="btn btn-primary m-2">Eventos</a>
        <a href="{{ route('artistas.index') }}" class="btn btn-success m-2">Artistas</a>
        <a href="{{ route('localidades.index') }}" class="btn btn-info m-2">Localidades</a>
        <a href="{{ route('boletas.index') }}" class="btn btn-warning m-2">Boletas</a>
    </div>
</div>
@endsection
