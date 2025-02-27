<x-layout.master>
    @section('title', 'Manajemen Angkatan')

    <h1 class="h3 mb-3"><strong>Manajemen Angkatan</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill" style="overflow-x: auto;">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Angkatan</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'official.*', 'official.create'])
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Angkatan<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Tahun</th>
                                <th class="bg-primary text-white" style="width : 200px !important">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($officials->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i data-feather="users" class="mb-2" style="width: 24px; height:24px"></i>
                                        <br>
                                        <span>Tidak ada angkatan yang tersedia.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($officials as $official)
                                    <tr>
                                        <td class="">{{ $official->year }}</td>
                                        <td>
                                            <div class="d-flex justify-content-evenly">
                                                {{-- Official Division Button --}}
                                                @canany(['sudo', 'official-division-management'])
                                                    <a class="btn btn-info"
                                                        href="{{ route('official.division.index', ['year' => $official->year]) }}"
                                                        data-bs-toggle="tooltip" title="Divisi angkatan">
                                                        <i class="align-middle" data-feather="users"></i>
                                                    </a>
                                                @endcanany

                                                {{-- Edit Button --}}
                                                @canany(['sudo', 'official.*', 'official.update'])
                                                    <div data-bs-toggle="tooltip" title="Ubah angkatan">
                                                        <button type="button" class="btn btn-warning text-dark"
                                                            data-bs-toggle="modal" data-bs-target="#formModal"
                                                            data-mode="edit"
                                                            data-action="{{ route('official.update', ['official' => $official->uuid]) }}"
                                                            data-official="{{ json_encode($official) }}">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </button>
                                                    </div>
                                                @endcanany

                                                <!-- Delete Button -->
                                                @canany(['sudo', 'official.*', 'official.delete'])
                                                    <div data-bs-toggle="tooltip" title="Hapus angkatan">
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteFormModal"
                                                            data-action="{{ route('official.destroy', ['official' => $official->uuid]) }}">
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
                        {{ $officials->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Angkatan Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Angkatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Angkatan Form -->
                        <form id="officialForm" action="{{ route('official.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="poster" class="form-label">Tahun Angkatan</label>
                                <select id="year" name="year"
                                    class="form-select  @error('year') is-invalid @enderror">
                                    <option selected disabled>Pilih Tahun</option>
                                </select>
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="poster" class="form-label">Poster</label>
                                <input type="file"
                                    class="filepond form-control  @error('posters.*') is-invalid @enderror"
                                    id="poster" name="posters[]" accept="image/*">
                                @error('posters.*')
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Angkatan Angkatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus Angkatan Angkatan ini?</p>

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
        <script>
            const fillForm = (official, filePond) => {
                // Pre-fill the form fields if editing a official
                document.getElementById('year').value = official.year;

                // Clear previous files in FilePond
                filePond.removeFiles();

                // Pre-fill the posters with existing images
                if (official.posters && official.posters.length > 0) {

                    const posterFiles = official.posters.map(poster => {

                        let image_path = poster?.url?.split('image/')[1];
                        return {
                            source: image_path,
                            options: {
                                type: 'local'
                            }
                        };
                    });


                    filePond.setOptions({
                        files: posterFiles
                    });
                }

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

            const resetForm = (filepond) => {
                // Pre-fill the form fields if editing a official
                filepond.removeFiles();
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Tooltip


                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Initialize FilePond on the input field
                const imageInput = document.querySelector('#poster');
                const pond = initializeImagePond(imageInput, true, 10);


                // Initialize Year Option
                const yearSelect = document.getElementById("year");

                getYear(yearSelect);

                // Handle the modal trigger for add and edit action
                let mode = 'create'
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        // clear form If mode was edit
                        if (mode === 'edit') resetForm(pond);

                        let actionUrl = button.getAttribute('data-action');
                        let official = JSON.parse(button.getAttribute('data-official'));
                        mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            resetValidation();

                            document.getElementById('formModalLabel').textContent = 'Ubah Angkatan';
                            document.getElementById('officialForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(official, pond);
                        } else {
                            // Set to Add official if no action URL is provided
                            document.getElementById('formModalLabel').textContent =
                                'Tambah Angkatan';
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
