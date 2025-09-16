<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SetiaNet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #171010; color: #f8f9fa; }
        .navbar { background-color: #362222; }
        .navbar-brand img { width: 40px; height: 40px; object-fit: contain; }
        .card { background-color: #2B2B2B; color: #f8f9fa; border-radius: 12px; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0px 4px 15px rgba(0,0,0,0.3); }
        .btn-custom { background-color: #423F3E; color: #f8f9fa; }
        .btn-custom:hover { background-color: #2B2B2B; }
        footer { background-color: #362222; color: #ccc; padding: 40px 0; }
        footer h5 { color: #fff; }
        footer a { color: #ccc; text-decoration: none; }
        footer a:hover { color: #fff; }
    </style>
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
