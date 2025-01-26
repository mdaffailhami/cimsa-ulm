<x-layout.master>
    @section('title', 'Manajemen Anggota Divisi')

    <div class="d-flex align-items-center mb-3" style="gap: 8px">
        <a href="{{ route('official.division.index', ['year' => $official->start_year]) }}" class="text-dark">
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
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-mode="create">
                        Tambah Divisi<i class="ms-2 align-middle" data-feather="plus"></i>
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="d-none d-xl-table-cell" style="width : 150px !important">Gambar</th>
                                <th class="d-none d-xl-table-cell">Nama</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                                <th class="d-none d-xl-table-cell">Posisi</th>
                                <th class="" style="width : 150px !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ $member->image }}" class="img-thumbnail" style="width: 300px"
                                            alt="{{ $member->name }}">
                                    </td>
                                    <td class="d-none d-xl-table-cell">{{ $member->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $member->email }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $member->position }}</td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">

                                            {{-- Edit Button --}}
                                            <button type="button" class="btn btn-warning text-dark"
                                                data-bs-toggle="modal" data-bs-target="#formModal" data-mode="edit"
                                                data-action="{{ route('official.division.member.update', ['member' => $member->id]) }}"
                                                data-member="{{ json_encode($member) }}">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteFormModal"
                                                data-action="{{ route('official.division.member.destroy', ['member' => $member->id]) }}">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

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
                                <input type="file" class="filepond" id="image" name="image"
                                    accept="image/*">
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

            const resetForm = () => {
                // Pre-fill the form fields if editing a member
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('position').value = '';
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

                // Initialize FilePond on the input field
                const imageInput = document.querySelector('#image');
                const pond = FilePond.create(imageInput, {
                    allowMultiple: false,
                    maxFiles: 1,
                    allowImagePreview: true,
                    acceptedFileTypes: ['image/*'],
                    server: {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        process: {
                            url: '{{ route('api.image.upload') }}', // Endpoint to handle the file upload
                            method: 'POST',
                            withCredentials: false,
                            onload: (response) => {
                                response = JSON.parse(response);
                                console.log(response);

                                return response; // Return the file path to FilePond
                            },
                            onerror: (response) => {
                                console.error('Error uploading file:', response);
                            }
                        },
                        revert: {
                            url: '{{ route('api.image.revert') }}', // Endpoint to revert/remove the uploaded file
                            method: 'POST',
                            withCredentials: false,
                            onload: (response) => {
                                // Handle the revert response
                                console.log('Revert response:', response);
                            },
                            onerror: (response) => {
                                console.error('Error reverting file:', response);
                            }
                        },
                        load: {
                            url: '/api/image/',
                            method: 'GET',
                            withCredentials: false,
                            onload: (response) => {
                                return response;
                            },
                            onerror: (response) => {
                                console.error('Error loading file:', response);
                            }
                        }
                    },
                });

                // Handle the modal trigger for add and edit action
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        let member = JSON.parse(button.getAttribute('data-member'));
                        let mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            document.getElementById('formModalLabel').textContent = 'Edit Anggota';
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
                        text: "{{ session('error') }}"
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
