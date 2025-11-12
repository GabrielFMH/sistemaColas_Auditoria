{{-- Vista de turno generado --}}
{{-- Puedes modificar estilos y textos, pero no cambies las variables $tipo y $num ni la lógica de redirección automática. --}}
@extends('cola.layout')
@section('title', 'Su Turno')
@section('head')
    <script>
        // Imprimir automáticamente el código al cargar la vista, formato pequeño tipo ticket cuadrado con código más grande
        window.onload = function() {
            var ventana = window.open('', '', 'width=140,height=180');
            ventana.document.write('<html><head><title>Imprimir Ticket</title></head><body style="font-family:Montserrat,sans-serif;text-align:center;padding:0;margin:0;width:120px;height:160px;box-sizing:border-box;">' +
                '<div style="border:1px dashed #333;border-radius:8px;padding:4px;width:110px;margin:auto;">' +
                '<h2 style="font-size:2.2rem;margin:8px 0;">{{ strtoupper($tipo) }}{{ $num }}</h2>' +
                '<hr style="margin:6px 0;border-top:1px dashed #333;">' +
                '<p style="font-size:0.8rem;margin:6px 0 0 0;">Gracias por su visita</p>' +
                '</div>' +
                '</body></html>');
            ventana.document.close();
            ventana.print();
        };
        setTimeout(function() {
            window.location.href = "{{ route('cola.index') }}";
        }, 5000);
    </script>
    <style>
        .turno-num {
            font-size: 6rem !important;
        }
        .turno-prefix-inf, .turno-prefix-ca {
            font-size: 6rem !important;
        }
    </style>
@endsection
@section('content')
    <div class="card p-5 text-center">
        <div class="turno-num mb-2">
            <span class="turno-prefix-{{ $tipo }}">{{ $tipo }}</span>{{ $num }}
        </div>
        <p class="fs-4 mb-4">Este es su turno</p>
        <p class="fs-5 text-success mb-4">Gracias por su visita</p>
        <a href="{{ route('cola.index') }}" class="btn btn-secondary btn-lg">Cerrar</a>
        <p class="mt-3 text-muted">Esta pantalla se cerrará automáticamente en 5 segundos</p>
    </div>
@endsection
