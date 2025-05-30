<x-layout.master>
    @section('title', 'Manajemen Komite')

    <h1 class="h3 mb-3"><strong>Manajemen Komite</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Komite</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'committe.*', 'committe.create'])
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Komite<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ route('committe.index') }}" method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Cari Nama..."
                                    aria-label="Search" value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip" title="Cari">
                                    <i class="align-middle" data-feather="search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div style="overflow-x: auto;">
                        <table class="table table-hover table-bordered my-0">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white d-none d-md-table-cell"
                                        style="width : 150px !important">Logo</th>
                                    <th class="bg-primary text-white">Nama</th>
                                    <th class="bg-primary text-white d-none d-md-table-cell">Deskripsi</th>
                                    <th class="bg-primary text-white" style="width : 150px !important">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($committees->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            <i data-feather="clipboard" class="mb-2"
                                                style="width: 24px; height:24px"></i>
                                            <br>
                                            <span>Tidak ada komite yang tersedia.</span>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($committees as $committe)
                                        <tr>
                                            <td class="d-none d-md-table-cell">
                                                <img src="{{ $committe->logo }}" class="img-thumbnail"
                                                    style="width: 150px" alt="{{ $committe->name }}">
                                            </td>
                                            <td class="">{{ $committe->name }}</td>
                                            <td class="d-none d-md-table-cell">{{ $committe->description }}</td>
                                            <td>
                                                <div class="d-flex justify-content-evenly">
                                                    {{-- Edit Button --}}
                                                    @canany(['sudo', 'committe.*', 'committe.update'])
                                                        <div data-bs-toggle="tooltip" title="Ubah komite">
                                                            <a class="btn btn-warning text-dark"
                                                                href="{{ route('committe.edit', ['committe' => $committe->name]) }}">
                                                                <i class="align-middle" data-feather="edit"></i>
                                                            </a>
                                                        </div>
                                                    @endcanany

                                                    <!-- Delete Button -->
                                                    @canany(['sudo', 'committe.*', 'committe.delete'])
                                                        <div data-bs-toggle="tooltip" title="Hapus komite">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="modal" data-bs-target="#deleteFormModal"
                                                                data-action="{{ route('committe.destroy', ['committe' => $committe->uuid]) }}">
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
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $committees->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Komite Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Komite</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Komite Form -->
                        <form id="committeForm" action="{{ route('committe.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Komite</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan nama..."
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Warna Komite</label>
                                <input type="color"
                                    class="form-control form-control-color @error('color') is-invalid @enderror"
                                    id="color" name="color" title="Pilih Warna" required>
                                @error('color')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Singkat</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan deskripsi..."
                                    id="description" name="description" value="{{ old('description') }}" required style="height: 100px"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo Komite</label>
                                <input type="file"
                                    class="filepond form-control @error('logo') is-invalid @enderror" id="logo"
                                    name="logo" accept="image/*">
                                @error('logo')
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Komite</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus Komite ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deleteCommitteForm" method="POST" style="display: inline;">
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
            const fillForm = (committe) => {
                // Pre-fill the form fields if editing a committe
                document.getElementById('name').value = committe.name;

            }

            const resetForm = () => {
                // Pre-fill the form fields if editing a committe
                document.getElementById('name').value = '';
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Tooltip
                let tooltipTriggerList = [].slice.call(document.querySelectorAll(
                    '[data-bs-toggle="tooltip"]'));
                let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Initialize FilePond on the input field
                const imageInput = document.querySelector('#logo');
                const pond = initializeImagePond(imageInput);

                // Handle the modal trigger for add and edit action
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        // let actionUrl = button.getAttribute('data-action');
                        // let committe = JSON.parse(button.getAttribute('data-committe'));
                        // let mode = button.getAttribute('data-mode');

                        // // Update modal title and action URL for editing
                        // if (mode === 'edit') {
                        //     document.getElementById('formModalLabel').textContent = 'Ubah komite';
                        //     document.getElementById('committeForm').setAttribute('action', actionUrl);
                        //     document.getElementById('submitButton').textContent = 'Ubah';
                        //     document.getElementById('method').value = 'PUT';

                        //     fillForm(committe);
                        // } else {
                        //     // Set to Add committe if no action URL is provided
                        //     document.getElementById('formModalLabel').textContent = 'Tambah Komite';
                        //     document.getElementById('committeForm').setAttribute('action',
                        //         '{{ route('committe.store') }}');
                        //     document.getElementById('submitButton').textContent = 'Simpan';
                        //     document.getElementById('method').value = 'POST';
                        // }

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deleteCommitteForm').setAttribute('action', actionUrl);
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
    @endsection
</x-layout.master>
