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
    <link rel="shortcut icon" href="/favicon.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>{{ ucwords($type) }}</title>

    <link href="/admin-dist/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('official.index') }}" class="text-dark">
                                    <i class="align-middle" data-feather="arrow-left"></i>
                                </a>
                            </div>

                            <div class="card-body">
                                <h1 class="h2 text-center mb-4">Yakin ingin melakukan perintah {{ ucwords($type) }} ?
                                </h1>
                                <form action="{{ route('command.action', ['type' => $type]) }}" method="POST"
                                    class="mx-3">
                                    @csrf

                                    <div class="mb-3">
                                        <input
                                            class="form-control form-control-lg @error('credentials') is-invalid @enderror"
                                            type="password" name="password" placeholder="Masukkan password" />
                                        @error('credentials')
                                            <div class="invalid-feedback d-inline-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        {{-- <small>
                                            <a href="index.html">Forgot password?</a>
                                        </small> --}}
                                    </div>

                                    <div class="text-center mt-3 ">
                                        <button type="submit" class="btn btn-lg btn-primary container">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/admin-dist/js/app.js"></script>

    @session('error')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    confirmButtonText: 'Lanjut'
                })
            });
        </script>
    @endsession

</body>

</html>
