<x-layout.master>
    @section('title', 'Manajemen Halaman')

    <h1 class="h3 mb-3"><strong>Manajemen Halaman</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Halaman</h5>

                    @canany(['sudo', 'page.*', 'page.create'])
                        {{-- Add Button --}}
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Halaman<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <form action="{{ route('page.index') }}" method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Cari Halaman ..."
                                    aria-label="Search" value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip" title="Cari">
                                    <i class="align-middle" data-feather="search"></i></button>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Nama</th>
                                <th class="bg-primary text-white">URL</th>
                                <th class="bg-primary text-white" style="width: 200px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pages->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i data-feather="layout" class="mb-2" style="width: 24px; height:24px"></i>
                                        <br>
                                        <span>Tidak ada halaman yang tersedia.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($pages as $page)
                                    <tr>
                                        <td class="">{{ $page->name }}</td>
                                        <td class=""><a href="{{ $page->url }}"
                                                target="_blank">{{ $page->url }}</a></td>
                                        <td class="">
                                            <div class="d-flex justify-content-evenly">
                                                {{-- Preview Button --}}
                                                @canany(['sudo', 'page-content-management'])
                                                    <a class="btn btn-info"
                                                        href="{{ route('page.edit', ['page' => $page->uri]) }}"
                                                        data-bs-toggle="tooltip" title="Konten halaman">
                                                        <i class="align-middle" data-feather="eye"></i>
                                                    </a>
                                                @endcanany


                                                {{-- Edit Button --}}
                                                @canany(['sudo', 'page.*', 'page.update'])
                                                    <div data-bs-toggle="tooltip" title="Ubah halaman">
                                                        <button type="button" class="btn btn-warning text-dark"
                                                            data-bs-toggle="modal" data-bs-target="#formModal"
                                                            data-mode="edit"
                                                            data-action="{{ route('page.update', ['page' => $page->uuid]) }}"
                                                            data-page="{{ json_encode($page) }}">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </button>
                                                    </div>
                                                @endcanany

                                                <!-- Delete Button -->
                                                @canany(['sudo', 'page.*', 'page.delete'])
                                                    <div data-bs-toggle="tooltip" title="Hapus halaman">
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteFormModal"
                                                            data-action="{{ route('page.destroy', ['page' => $page->uuid]) }}">
                                                            <i class="align-middle" data-feather="trash"></i>
                                                        </button>
                                                    </div>
                                                @endcanany
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $pages->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Halaman Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Halaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Halaman Form -->
                        <form id="pageForm" action="{{ route('page.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">
                            <input type="hidden" name="form_category" id="form-category" value="profile">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Halaman</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan nama..."
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button id="submitButton" type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteFormModal" tabindex="-1" aria-labelledby="deleteFormModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Halaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus Halaman ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deletePageForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')
        <script>
            const fillForm = (page) => {
                // Pre-fill the form fields if editing a page
                document.getElementById('name').value = page.name;

            }

            const resetForm = () => {
                // Pre-fill the form fields if editing a page
                document.getElementById('name').value = '';
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Tooltip
                let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Handle the modal trigger for add and edit action
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        let page = JSON.parse(button.getAttribute('data-page'));
                        let mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            document.getElementById('formModalLabel').textContent = 'Ubah Halaman';
                            document.getElementById('pageForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(page);
                        } else {
                            // Set to Add page if no action URL is provided
                            document.getElementById('formModalLabel').textContent = 'Tambah Halaman';
                            document.getElementById('pageForm').setAttribute('action',
                                '{{ route('page.store') }}');
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';
                        }

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deletePageForm').setAttribute('action', actionUrl);
                    });
                });
            });
        </script>

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
                        title: 'Validasi Error',
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
    @endsection
</x-layout.master>
