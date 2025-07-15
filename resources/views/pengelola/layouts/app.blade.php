<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengelola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        footer {
            border-top: 1px solid #dee2e6;
            margin-top: 2rem;
            padding-top: 1rem;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        @include('pengelola.layouts.sidebar')

        <div class="flex-grow-1 d-flex flex-column p-4" style="min-height: 100vh;">
            <main class="flex-grow-1">
                @yield('content')
            </main>

            <footer>
                &copy; {{ date('Y') }} Sistem Informasi Pengelolaan.
            </footer>
        </div>
    </div>
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
