<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Colas')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <!-- Font Awesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css para animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            font-family: 'Montserrat', sans-serif;
        }
        .card {
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            border-radius: 20px;
        }
        .btn-lg {
            font-size: 1.3rem;
            padding: 0.75rem 2.5rem;
            border-radius: 12px;
        }
        .turno-num {
            font-size: 4rem;
            font-weight: bold;
            color: #007bff;
            letter-spacing: 2px;
        }
        .turno-prefix-inf { color: #007bff; }
        .turno-prefix-ca { color: #28a745; }
    </style>
    @yield('head')
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        @yield('content')
    </div>
    <!-- Footer bonito -->
    <footer class="text-center text-muted mt-4 animate__animated animate__fadeInUp">
        <small><i class="fa-solid fa-ticket"></i> Sistema de Gestión de Colas &copy; 2025</small>
    </footer>
</body>
</html>
