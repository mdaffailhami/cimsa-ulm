<x-layout.master>
    @section('title', 'Manajemen Divisi Angkatan')

    <div class="d-flex align-items-center mb-3" style="gap: 8px">
        <a href="{{ route('official.index') }}" class="text-dark">
            <i class="align-middle" data-feather="arrow-left"></i>
        </a>
        <h1 class="h3 m-0"><strong>Manajemen Divisi Angkatan {{ $official->year }}</h1>
    </div>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill" style="overflow-x: auto;">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Daftar Divisi Angkatan {{ $official->year }}</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'official-division.*', 'official-division.create'])
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Divisi<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <form action="{{ route('official.division.index', ['year' => $official->year]) }}"
                                method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Cari Nama Divisi..." aria-label="Search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip" title="Cari">
                                    <i class="align-middle" data-feather="search"></i></button>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Nama</th>
                                <th class="bg-primary text-white" style="width : 200px !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($divisions->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i data-feather="users" class="mb-2" style="width: 24px; height:24px"></i>
                                        <br>
                                        <span>Tidak ada divisi yang tersedia.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($divisions as $division)
                                    <tr>
                                        <td class="">{{ $division->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-evenly">
                                                {{-- Division Button --}}
                                                @canany(['sudo', 'official-division-member-management'])
                                                    <a class="btn btn-info"
                                                        href="{{ route('official.division.member.index', ['year' => $official->year, 'id' => $division->id]) }}"
                                                        data-bs-toggle="tooltip" title="Anggota divisi">
                                                        <i class="align-middle" data-feather="users"></i>
                                                    </a>
                                                @endcanany

                                                {{-- Edit Button --}}
                                                @canany(['sudo', 'official-division.*', 'official-division.update'])
                                                    <div data-bs-toggle="tooltip" title="Ubah divisi">
                                                        <button type="button" class="btn btn-warning text-dark"
                                                            data-bs-toggle="modal" data-bs-target="#formModal"
                                                            data-mode="edit"
                                                            data-action="{{ route('official.division.update', ['division' => $division->id]) }}"
                                                            data-division="{{ json_encode($division) }}">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </button>
                                                    </div>
                                                @endcanany

                                                <!-- Delete Button -->
                                                @canany(['sudo', 'official-division.*', 'official-division.delete'])
                                                    <div data-bs-toggle="tooltip" title="Hapus divisi">
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteFormModal"
                                                            data-action="{{ route('official.division.destroy', ['division' => $division->id]) }}">
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
                        {{ $divisions->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Divisi Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Divisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Divisi Form -->
                        <form id="officialDivisionForm" action="{{ route('official.division.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">
                            <input type="hidden" name="official_id" id="method" value="{{ $official->uuid }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Divisi</label>
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Angkatan Divisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus Angkatan Divisi ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deleteOfficialDivisionForm" method="POST" style="display: inline;">
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
        {{-- Modal --}}
        <script>
            const fillForm = (official) => {
                // Pre-fill the form fields if editing a official
                document.getElementById('name').value = official.name;
            }

            const resetForm = () => {
                // Pre-fill the form fields if editing a official
                document.getElementById('name').value = '';
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Tooltip


                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Handle the modal trigger for add and edit action
                let mode = "create";
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        if (mode === 'edit') resetForm();

                        let actionUrl = button.getAttribute('data-action');
                        let division = JSON.parse(button.getAttribute('data-division'));
                        mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            resetValidation();

                            document.getElementById('formModalLabel').textContent = 'Ubah Divisi';
                            document.getElementById('officialDivisionForm').setAttribute('action',
                                actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(division);
                        } else {
                            // Set to Add division if no action URL is provided
                            document.getElementById('formModalLabel').textContent =
                                'Tambah Divisi';
                            document.getElementById('officialDivisionForm').setAttribute('action',
                                '{{ route('official.division.store') }}'
                            );
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';
                        }

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deleteOfficialDivisionForm').setAttribute('action',
                            actionUrl);
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
