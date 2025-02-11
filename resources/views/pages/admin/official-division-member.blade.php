<x-layout.master>
    @section('title', 'Manajemen Anggota Divisi')

    <div class="d-flex align-items-center mb-3" style="gap: 8px">
        <a href="{{ route('official.division.index', ['year' => $official->year]) }}" class="text-dark">
            <i class="align-middle" data-feather="arrow-left"></i>
        </a>
        <h1 class="h3 m-0"><strong>Manajemen Anggota Divisi {{ $division->name }}</h1>
    </div>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">


                    <h5 class="card-title mb-0">Daftar Anggota Divisi {{ $division->name }}</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'official-division-member.*', 'official-division-member.create'])
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Anggota<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <form
                                action="{{ route('official.division.member.index', ['year' => $official->year, 'id' => $division->id]) }}"
                                method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Cari Nama, Email..." aria-label="Search"
                                    value="{{ request('search') }}">
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
                                        style="width : 150px !important">Gambar</th>
                                    <th class="bg-primary text-white">Nama</th>
                                    <th class="bg-primary text-white">Email</th>
                                    <th class="bg-primary text-white">Posisi</th>
                                    <th class="bg-primary text-white" style="width : 150px !important">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($members->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            <i data-feather="users" class="mb-2" style="width: 24px; height:24px"></i>
                                            <br>
                                            <span>Tidak ada divisi yang tersedia.</span>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($members as $member)
                                        <tr>
                                            <td class="text-center d-none d-md-table-cell">
                                                <img src="{{ $member->image }}" class="img-thumbnail"
                                                    style="width: 250px" alt="{{ $member->name }}">
                                            </td>
                                            <td class="">{{ $member->name }}</td>
                                            <td class="">{{ $member->email }}</td>
                                            <td class="">{{ $member->position }}</td>
                                            <td>
                                                <div class="d-flex justify-content-evenly">

                                                    {{-- Edit Button --}}
                                                    @canany(['sudo', 'official-division-member.*',
                                                        'official-division-member.update'])
                                                        <div data-bs-toggle="tooltip" title="Ubah anggota">
                                                            <button type="button" class="btn btn-warning text-dark"
                                                                data-bs-toggle="modal" data-bs-target="#formModal"
                                                                data-mode="edit"
                                                                data-action="{{ route('official.division.member.update', ['member' => $member->id]) }}"
                                                                data-member="{{ json_encode($member) }}">
                                                                <i class="align-middle" data-feather="edit"></i>
                                                            </button>
                                                        </div>
                                                    @endcanany

                                                    <!-- Delete Button -->
                                                    @canany(['sudo', 'official-division-member.*',
                                                        'official-division-member.delete'])
                                                        <div data-bs-toggle="tooltip" title="Hapus anggota">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="modal" data-bs-target="#deleteFormModal"
                                                                data-action="{{ route('official.division.member.destroy', ['member' => $member->id]) }}">
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
                        {{ $members->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Member Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Divisi Form -->
                        <form id="officialDivisionMemberForm" action="{{ route('official.division.member.store') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">
                            <input type="hidden" name="division_id" id="method" value="{{ $division->id }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Anggota</label>
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
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukkan email..."
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Posisi</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                    id="position" name="position" placeholder="Masukkan posisi..."
                                    value="{{ old('position') }}" required>
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file"
                                    class="filepond form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" accept="image/*">
                                @error('image')
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Anggota Divisi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus anggota divisi ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deleteOfficialDivisionMemberForm" method="POST" style="display: inline;">
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
            const fillForm = (member, filePond) => {
                // Pre-fill the form fields if editing a member
                document.getElementById('name').value = member.name;
                document.getElementById('email').value = member.email;
                document.getElementById('position').value = member.position;

                // Clear previous files in FilePond
                filePond.removeFiles();

                let file_path = member.image.split('image/')[1];

                // Add the existing file using the image URL
                filePond.setOptions({
                    files: [{
                        source: file_path,
                        options: {
                            type: 'local',
                        }
                    }, ]
                })
            }

            const resetForm = (filePond) => {
                // Pre-fill the form fields if editing a member
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('position').value = '';

                filePond.removeFiles();
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Tooltip


                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Initialize FilePond on the input field
                const imageInput = document.querySelector('#image');
                const pond = initializeImagePond(imageInput);

                // Handle the modal trigger for add and edit action
                let mode = 'create'
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        if (mode === 'edit') resetForm(pond);

                        let actionUrl = button.getAttribute('data-action');
                        let member = JSON.parse(button.getAttribute('data-member'));
                        mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            resetValidation();

                            document.getElementById('formModalLabel').textContent = 'Ubah Anggota';
                            document.getElementById('officialDivisionMemberForm').setAttribute('action',
                                actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(member, pond);
                        } else {
                            // Set to Add member if no action URL is provided
                            document.getElementById('formModalLabel').textContent =
                                'Tambah Anggota';
                            document.getElementById('officialDivisionMemberForm').setAttribute('action',
                                '{{ route('official.division.member.store') }}'
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
                        document.getElementById('deleteOfficialDivisionMemberForm').setAttribute(
                            'action',
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
