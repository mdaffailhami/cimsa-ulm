<x-layout.master>
    @section('title', 'Manajemen Kategori')

    <h1 class="h3 mb-3"><strong>Manajemen Kategori</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Kategori</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'category.*', 'category.create'])
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Kategori<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <form action="{{ route('category.index') }}" method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Cari Kategori..."
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
                                <th class="bg-primary text-white" style="width : 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->isEmpty())
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-4">
                                        <i data-feather="layers" class="mb-2" style="width: 24px; height:24px"></i>
                                        <br>
                                        <span>Tidak ada kategori yang tersedia.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="">{{ $category->name }}</td>
                                        <td class="">
                                            <div class="d-flex justify-content-evenly">
                                                {{-- Edit Button --}}
                                                @canany(['sudo', 'category.*', 'category.update'])
                                                    <div data-bs-toggle="tooltip" title="Ubah kategori">
                                                        <button type="button" class="btn btn-warning text-dark"
                                                            data-bs-toggle="modal" data-bs-target="#formModal"
                                                            data-mode="edit"
                                                            data-action="{{ route('category.update', ['category' => $category->id]) }}"
                                                            data-category="{{ json_encode($category) }}">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </button>
                                                    </div>
                                                @endcanany

                                                <!-- Delete Button -->
                                                @canany(['sudo', 'category.*', 'category.delete'])
                                                    <div data-bs-toggle="tooltip" title="Hapus kategori">
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteFormModal"
                                                            data-action="{{ route('category.destroy', ['category' => $category->id]) }}">
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
                        {{ $categories->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Kategori Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Kategori Form -->
                        <form id="categoryForm" action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus kategori ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deletecategoryForm" method="POST" style="display: inline;">
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
            const fillForm = (category) => {
                // Pre-fill the form fields if editing a category
                document.getElementById('name').value = category.name;
            }

            const resetForm = () => {
                // Pre-fill the form fields if editing a category
                document.getElementById('name').value = '';
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initiate Tooltip
                let tooltipTriggerList = [].slice.call(document.querySelectorAll(
                    '[data-bs-toggle="tooltip"]'));
                let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Initiate Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Handle the modal trigger for add and edit action
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        let category = JSON.parse(button.getAttribute('data-category'));
                        let mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            document.getElementById('formModalLabel').textContent = 'Ubah Kategori';
                            document.getElementById('categoryForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(category);
                        } else {
                            // Set to Add category if no action URL is provided
                            document.getElementById('formModalLabel').textContent = 'Tambah Kategori';
                            document.getElementById('categoryForm').setAttribute('action',
                                '{{ route('category.store') }}');
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';
                        }

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deletecategoryForm').setAttribute('action', actionUrl);
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
