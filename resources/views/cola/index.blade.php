<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Colas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    {{-- Vista principal de la gestión de colas --}}
    {{-- Puedes cambiar los estilos, textos y diseño visual aquí. --}}
    {{-- No elimines los enlaces ni cambies las rutas si quieres mantener el flujo de turnos. --}}
    @extends('cola.layout')
    @section('title', 'Gestión de Colas')
    @section('content')
        <div class="card p-5 text-center">
            <h1 class="mb-4" style="color:#007bff;font-weight:700;">Gestión de Colas</h1>
            <div class="d-flex justify-content-center mb-4">
                <a href="{{ route('turno.informe') }}" class="btn btn-primary btn-lg mx-2 shadow">Informes</a>
                <a href="{{ route('turno.caja') }}" class="btn btn-success btn-lg mx-2 shadow">Compra de Servicio</a>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <a href="{{ route('cola.tv') }}" class="btn btn-warning btn-lg mx-2"><i class="fa-solid fa-tv"></i> Vista TV</a>
                <a href="{{ route('cola.empleado') }}" class="btn btn-info btn-lg mx-2"><i class="fa-solid fa-user-tie"></i> Vista Empleado</a>
            </div>
            <p class="text-muted">Seleccione una opción para obtener su turno o gestionar la cola</p>
        </div>
    @endsection
</body>
</html>
