<x-layout.master>
    @section('title', 'Manajemen Komite')

    <h1 class="h3 mb-3"><strong>Manajemen Komite</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Komite</h5>

                    {{-- Add Button --}}
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-mode="create">
                        Tambah Komite<i class="ms-2 align-middle" data-feather="plus"></i>
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="d-none d-xl-table-cell" style="width : 120px !important">Logo</th>
                                <th class="d-none d-xl-table-cell">Nama</th>
                                <th class="d-none d-xl-table-cell">Deskripsi</th>
                                <th class="" style="width : 150px !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($committees as $committe)
                                <tr>
                                    <td class="">
                                        <img src="{{ $committe->logo }}" class="img-thumbnail" style="width: 100px"
                                            alt="{{ $committe->name }}">
                                    </td>
                                    <td class="d-none d-xl-table-cell">{{ $committe->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $committe->description }}</td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            {{-- Edit Button --}}
                                            <a class="btn btn-warning text-dark"
                                                href="{{ route('committe.edit', ['committe' => $committe->name]) }}">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </a>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteFormModal"
                                                data-action="{{ route('committe.destroy', ['committe' => $committe->uuid]) }}">
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
                                <input type="file" class="filepond" id="logo" name="logo" accept="image/*">
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
            document.addEventListener('DOMContentLoaded', function() {
                let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

            });
        </script>

        {{-- Modal --}}
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
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Initialize FilePond on the input field
                const imageInput = document.querySelector('#logo');
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
                        let committe = JSON.parse(button.getAttribute('data-committe'));
                        let mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            document.getElementById('formModalLabel').textContent = 'Edit committe';
                            document.getElementById('committeForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(committe);
                        } else {
                            // Set to Add committe if no action URL is provided
                            document.getElementById('formModalLabel').textContent = 'Tambah Komite';
                            document.getElementById('committeForm').setAttribute('action',
                                '{{ route('committe.store') }}');
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';
                        }

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
