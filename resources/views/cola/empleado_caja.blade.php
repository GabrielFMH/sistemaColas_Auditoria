{{-- Vista de gestión de caja e informes para el empleado --}}
@extends('cola.layout')
@section('title', 'Turnos Caja e Informes')
@section('content')
<div class="row w-100 animate__animated animate__fadeIn">
    <div class="col-md-6">
        <div class="card p-4 mb-4">
            <h3 class="mb-3 text-success"><i class="fa-solid fa-cash-register"></i> Caja <span class="badge bg-warning text-dark">Prioridad</span></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cajas as $caja)
                    <tr>
                        <td><span class="badge bg-success fs-4">CA{{ $caja->num_ticket }}</span></td>
                        <td>
                            <form method="POST" action="{{ route('ticket.llamar', ['tipo' => 'caja', 'id' => $caja->id]) }}" style="display:inline-block;">
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
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4 mb-4">
            <h3 class="mb-3 text-primary"><i class="fa-solid fa-file-alt"></i> Informes</h3>
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
        </div>
    </div>
</div>
<div class="d-flex justify-content-between mt-3">
    <a href="{{ route('cola.empleado') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
