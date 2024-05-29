<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>Dashboard - NiceAdmin Bootstrap Template</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <!-- Favicons -->
        <link href="/assets/img/favicon.png" rel="icon" />
        <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect" />
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet" />

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Template Main CSS File -->
        <link href="/assets/css/style.css" rel="stylesheet" />
    </head>

    <body >
        <!-- ======= Header ======= -->
        @include('partials.header')

        <!-- ======= Sidebar ======= -->
        @include('partials.sidebar')

        <main id="main" class="main">
            @yield('main')
        </main>

        <!-- Vendor JS Files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Template Main JS File -->
        <script src="/assets/js/main.js"></script>
    </body>
</html>