<x-layout.master>
    @section('title', 'Manajemen Angkatan')

    <h1 class="h3 mb-3"><strong>Manajemen Angkatan</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Angkatan</h5>

                    {{-- Add Button --}}
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-mode="create">
                        Tambah Angkatan<i class="ms-2 align-middle" data-feather="plus"></i>
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="d-none d-xl-table-cell" style="width : 120px !important">Tahun</th>
                                <th class="d-none d-xl-table-cell">Poster</th>
                                <th class="" style="width : 150px !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($officials as $official)
                                <tr>
                                    <td class="d-none d-xl-table-cell">{{ $official->year }}</td>
                                    <td class="text-center">
                                        <img src="{{ $official->poster }}" class="img-thumbnail" style="width: 300px"
                                            alt="{{ $official->name }}">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            {{-- Division Button --}}
                                            <a class="btn btn-info"
                                                href="{{ route('official.division.index', ['year' => $official->year]) }}">
                                                <i class="align-middle" data-feather="users"></i>
                                            </a>

                                            {{-- Edit Button --}}
                                            <button type="button" class="btn btn-warning text-dark"
                                                data-bs-toggle="modal" data-bs-target="#formModal" data-mode="edit"
                                                data-action="{{ route('official.update', ['official' => $official->uuid]) }}"
                                                data-official="{{ json_encode($official) }}">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteFormModal"
                                                data-action="{{ route('official.destroy', ['official' => $official->uuid]) }}">
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
                        {{ $officials->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Organisasi Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Organisasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Organisasi Form -->
                        <form id="officialForm" action="{{ route('official.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="poster" class="form-label">Tahun Angkatan Organisasi</label>
                                <select id="year" name="year" class="form-select">
                                    <option selected disabled>Pilih Tahun</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="poster" class="form-label">Poster Angkatan Organisasi</label>
                                <input type="file" class="filepond" id="poster" name="poster" accept="image/*">
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Angkatan Organisasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus Angkatan Organisasi ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deleteOfficialForm" method="POST" style="display: inline;">
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
            const fillForm = (official, filePond) => {
                // Pre-fill the form fields if editing a official
                document.getElementById('year').value = official.year;

                // Clear previous files in FilePond
                filePond.removeFiles();

                let file_path = official.poster.split('image/')[1];

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
                // Pre-fill the form fields if editing a official
                document.getElementById('year').value = '';
            }

            const getYear = () => {
                const yearSelect = document.getElementById("year");
                const currentYear = new Date().getFullYear();
                const startYear = 2000;

                for (let year = currentYear; year >= startYear; year--) {
                    const option = document.createElement("option");
                    option.value = year;
                    option.textContent = year;

                    if (year === currentYear) {
                        option.selected = true;
                    }

                    yearSelect.appendChild(option);
                }
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
                const imageInput = document.querySelector('#poster');
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

                // Initialize Year Option
                getYear()

                // Handle the modal trigger for add and edit action
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        let official = JSON.parse(button.getAttribute('data-official'));
                        let mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            document.getElementById('formModalLabel').textContent = 'Edit official';
                            document.getElementById('officialForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(official, pond);
                        } else {
                            // Set to Add official if no action URL is provided
                            document.getElementById('formModalLabel').textContent =
                                'Tambah Organisasi';
                            document.getElementById('officialForm').setAttribute('action',
                                '{{ route('official.store') }}');
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';
                        }

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deleteOfficialForm').setAttribute('action', actionUrl);
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
