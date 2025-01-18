<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CIMSA ULM Admin Portal">
    <meta name="author" content="Dzakiy Dzakwan">
    <meta name="keywords" content="cimsa-ulm, cimsa, ulm">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('/admin-dist/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    @viteReactRefresh

    @vite(['resources/js/app.jsx'])
    <!-- As you can see, we will use vite with jsx syntax for React-->
    @inertiaHead
</head>

<body>

    @inertia
    <script src="{{ asset('/admin-dist/js/app.js') }}" defer></script>


</body>

</html>
