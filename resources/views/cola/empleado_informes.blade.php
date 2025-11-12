{{-- Vista de gestión de informes para el empleado --}}
@extends('cola.layout')
@section('title', 'Turnos Informes')
@section('content')
<div class="card p-4 animate__animated animate__fadeIn">
    <h3 class="mb-3 text-primary"><i class="fa-solid fa-file-alt"></i> Turnos de Informes</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($informes as $informe)
            <tr>
                <td><span class="badge bg-primary fs-4">INF{{ $informe->num_ticket }}</span></td>
                <td>
                    <form method="POST" action="{{ route('ticket.llamar', ['tipo' => 'informe', 'id' => $informe->id]) }}" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Llamar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-muted">No hay turnos pendientes.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('cola.empleado') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
