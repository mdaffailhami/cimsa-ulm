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

    <title>Sign In</title>

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

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome Back 🥳</h1>
                            <p class="lead">
                                Sign in to your account to access the dashboard
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    {{-- <div class="text-center">
                                        <img src="{{ asset('/admin-dist/img/avatars/avatar.jpg') }}" alt="Charles Hall"
                                            class="img-fluid rounded-circle" width="132" height="132" />
                                    </div> --}}
                                    <form action="{{ route('admin.login') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input
                                                class="form-control form-control-lg @error('credentials') is-invalid @enderror"
                                                type="text" name="username" placeholder="Enter your username"
                                                value="{{ old('username') }}" autocomplete="off" />

                                            @error('credentials')
                                                <div class="invalid-feedback d-inline-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input
                                                class="form-control form-control-lg @error('credentials') is-invalid @enderror"
                                                type="password" name="password" placeholder="Enter your password" />
                                            @error('credentials')
                                                <div class="invalid-feedback d-inline-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            {{-- <small>
                                                <a href="index.html">Forgot password?</a>
                                            </small> --}}
                                        </div>

                                        {{-- <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me"
                                                    name="remember-me" checked>
                                                <span class="form-check-label">
                                                    Remember me next time
                                                </span>
                                            </label>
                                        </div> --}}

                                        <div class="text-center mt-3 ">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary container">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/admin-dist/js/app.js"></script>

    {{-- Alert --}}
    @session('success')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
            });
        </script>
    @endsession

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

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Validasi Gagal',
                    html: `
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    `,
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let formModal = new bootstrap.Modal(document.getElementById('formModal'));

                        formModal.show();
                    }
                });;


            });
        </script>
    @endif

</body>

</html>
