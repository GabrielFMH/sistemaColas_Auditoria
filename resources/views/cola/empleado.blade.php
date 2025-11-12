{{-- Vista principal del empleado --}}
@extends('cola.layout')
@section('title', 'Vista Empleado')
@section('content')
<div class="card p-5 text-center animate__animated animate__fadeIn">
    <h2 class="mb-4"><i class="fa-solid fa-user-tie"></i> Panel de Empleado</h2>
    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('empleado.informes') }}" class="btn btn-primary btn-lg mx-2">Informes</a>
        <a href="{{ route('empleado.caja') }}" class="btn btn-success btn-lg mx-2">Caja</a>
    </div>
    <p class="text-muted">Seleccione una opción para gestionar los turnos</p>
    <a href="{{ route('cola.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
