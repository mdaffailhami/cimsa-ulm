<x-layout.master>
    @section('title', 'Dashboard')

    <h1 class="h3 mb-3"><strong>Manajemen User</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar User</h5>

                    <button class="btn btn-primary">Tambah User <i class="align-middle" data-feather="plus"></i>
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th class="">Nama Lengkap</th>
                                <th class="">Email</th>
                                <th class="">Nomor HP</th>
                                <th class="">Password</th>
                                <th class="">Role</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td class="">{{ $user->full_name }}</td>
                                    <td class="">{{ $user->email }}</td>
                                    <td class="">{{ $user->phone }}</td>
                                    <td class="">{{ $user->visible_password }}</td>
                                    <td><span class="badge bg-primary p-2">{{ $user->roles[0]->name }}</span></td>
                                    <td class="">
                                        <div class="d-flex justify-content-evenly">
                                            <button type="button" class="btn btn-warning text-dark"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ubah">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-title="Hapus">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- Pagination --}}
                        <caption class="mb-0 ">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </caption>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>
    @endsection
</x-layout.master>
