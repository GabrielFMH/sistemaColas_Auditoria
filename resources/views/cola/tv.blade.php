{{-- Vista TV: muestra el último llamado en grande y los siguientes 3 en cola --}}
@extends('cola.layout')
@section('title', 'Vista TV')
@section('head')
    <style>
        .parpadea {
            animation: parpadeo 1s infinite;
        }
        @keyframes parpadeo {
            0% { color: red; }
            50% { color: #fff; }
            100% { color: red; }
        }
    </style>
@endsection
@section('content')
<div class="row w-100 animate__animated animate__fadeIn">
    <div class="col-md-6">
        <div class="card p-4 mb-4 text-center">
            <h3 class="mb-3 text-primary"><i class="fa-solid fa-file-alt"></i> Informes</h3>
            @if($ultimoInforme)
                <div class="mb-4">
                    <span class="badge parpadea" style="font-size:5rem;background:red;">INF{{ $ultimoInforme->num_ticket }}</span>
                    <div class="text-muted mt-2">Último llamado</div>
                </div>
            @endif
            <div class="d-flex justify-content-center gap-3">
                @foreach($colaInformes as $informe)
                    <span class="badge bg-primary" style="font-size:2rem;">INF{{ $informe->num_ticket }}</span>
                @endforeach
            </div>
            @if($colaInformes->isEmpty() && !$ultimoInforme)
                <p class="text-muted">No hay turnos llamados.</p>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4 mb-4 text-center">
            <h3 class="mb-3 text-success"><i class="fa-solid fa-cash-register"></i> Caja</h3>
            @if($ultimoCaja)
                <div class="mb-4">
                    <span class="badge parpadea" style="font-size:5rem;background:red;">CA{{ $ultimoCaja->num_ticket }}</span>
                    <div class="text-muted mt-2">Último llamado</div>
                </div>
            @endif
            <div class="d-flex justify-content-center gap-3">
                @foreach($colaCajas as $caja)
                    <span class="badge bg-success" style="font-size:2rem;">CA{{ $caja->num_ticket }}</span>
                @endforeach
            </div>
            @if($colaCajas->isEmpty() && !$ultimoCaja)
                <p class="text-muted">No hay turnos llamados.</p>
            @endif
        </div>
    </div>
</div>
<a href="{{ route('cola.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
