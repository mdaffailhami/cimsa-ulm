<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>@yield('title')</title>

    <link href="/admin-dist/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/admin-dist/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js'])

    @yield('styles')

    <style>
        /* Loading Style */
        .loading-icon {
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        .loading-text {
            font-size: 1.2rem;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>


</head>

<body>
    <div class="wrapper">
        <x-layout.sidebar />

        <div class="main">
            <x-layout.navbar />

            <main class="content">
                <div id="loading-container"
                    class="d-flex flex-column justify-content-center align-items-center position-fixed top-0 start-0 w-100 h-100 bg-white opacity-75"
                    style="z-index: 1050;">

                    <svg class="loading-icon text-primary mb-2" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                        <path d="M12 2a10 10 0 0 1 10 10" stroke-opacity="1"></path>
                    </svg>

                    <p class="loading-text text-primary fw-semibold">Loading</p>
                </div>

                <div id="container" class="container-fluid p-0 d-none">

                    {{ $slot }}
                </div>
            </main>

            <x-layout.footer />
        </div>
    </div>

    <script src="/admin-dist/bootstrap/js/bootstrap.js"></script>
    <script src="/admin-dist/js/app.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadingContainer = document.getElementById('loading-container');
            const contentContainer = document.getElementById('container');
            loadingContainer.classList.add('d-none');
            contentContainer.classList.remove('d-none');

            console.log("DOM Loaded");

        })
    </script>

    @yield('scripts')

</body>

</html>
