<!-- resources/views/admin/profile.blade.php -->
@extends('layouts.admin')

@section('title', 'Perfil - Administrador')

@section('content')
  <h1 class="mb-4">Perfil</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $user->name ?? 'Administrador' }}</h5>
      <p class="card-text"><strong>Email:</strong> {{ $user->email ?? 'no definido' }}</p>
      <p class="card-text"><small class="text-muted">ID: {{ $user->id ?? '—' }}</small></p>
      <!-- Si quieres agregar edición, agrega un link a la página de editar perfil -->
    </div>
  </div>
@endsection
