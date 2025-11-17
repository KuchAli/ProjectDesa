<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        body { background: #f5f6fa; }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #103f18;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            font-size: 15px;
        }
        .sidebar a:hover {
            background: #0d3514;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar { margin-left: 250px; }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
   @include('admin.layouts.sidebar')

    <!-- NAVBAR TOP -->
    <nav class="navbar navbar-light shadow-sm" style="background-color: #02270a">
        <div class="container-fluid mb-2">
            <span class="navbar-brand  h5 fs-4 text-white">@yield('title')</span>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="content">
        @yield('admin-content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>