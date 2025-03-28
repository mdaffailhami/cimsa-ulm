<x-layout.master>
    @section('title', 'Manajemen Pelatihan')

    <h1 class="h3 mb-3"><strong>Manajemen Pelatihan</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill" style="overflow-x: auto;">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Pelatihan</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'training.*', 'training.create'])
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Pelatihan<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ route('training.index') }}" method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Cari Nama ..."
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
                                <th class="bg-primary text-white d-none d-md-table-cell">Deskripsi</th>
                                <th class="bg-primary text-white d-none d-md-table-cell" style="width: 250px">Gambar
                                </th>
                                <th class="bg-primary text-white" style="width:150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($trainings->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <i data-feather="book-open" class="mb-2" style="width: 24px; height:24px"></i>
                                        <br>
                                        <span>Tidak ada pelatihan yang tersedia.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($trainings as $training)
                                    <tr>
                                        <td class="">{{ $training->name }}</td>
                                        <td class="d-none d-md-table-cell">{{ $training->description }}</td>
                                        <td class="d-none d-md-table-cell">
                                            <img src="{{ $training->image }}" class="img-thumbnail" style="width: 300px"
                                                alt="{{ $training->name }}">
                                        </td>
                                        <td class="">
                                            <div class="d-flex justify-content-evenly">
                                                {{-- Edit Button --}}
                                                @canany(['sudo', 'training.*', 'training.update'])
                                                    <div data-bs-toggle="tooltip" title="Ubah pelatihan">
                                                        <button type="button" class="btn btn-warning text-dark"
                                                            data-bs-toggle="modal" data-bs-target="#formModal"
                                                            data-mode="edit"
                                                            data-action="{{ route('training.update', ['training' => $training->id]) }}"
                                                            data-training="{{ json_encode($training) }}">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </button>
                                                    </div>
                                                @endcanany

                                                <!-- Delete Button -->
                                                @canany(['sudo', 'training.*', 'training.delete'])
                                                    <div data-bs-toggle="tooltip" title="Hapus pelatihan">
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#deleteFormModal"
                                                            data-action="{{ route('training.destroy', ['training' => $training->id]) }}">
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
                        {{ $trainings->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Pelatihan Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Pelatihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Pelatihan Form -->
                        <form id="trainingForm" action="{{ route('training.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Pelatihan</label>
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
                                <label for="url" class="form-label">Link url</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror"
                                    id="url" name="url" placeholder="Masukkan link url..."
                                    value="{{ old('url') }}" required>
                                @error('url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Pelatihan</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan deskripsi..."
                                    id="description" name="description" value="{{ old('description') }}" required style="height: 100px"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Pelatihan</label>
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus pelatihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus pelatihan ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deletetrainingForm" method="POST" style="display: inline;">
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
            const fillForm = (training, filePond) => {
                // Pre-fill the form fields if editing a training
                document.getElementById('name').value = training.name;
                document.getElementById('url').value = training.url;
                document.getElementById('description').value = training.description;

                // Clear previous files in FilePond
                filePond.removeFiles();

                let file_path = training.image.split('image/')[1];


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
                // Pre-fill the form fields if editing a training
                document.getElementById('name').value = "";
                document.getElementById('url').value = "";
                document.getElementById('description').value = "";

                filePond.removeFiles();
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Initialize FilePond on the input field
                const imageInput = document.querySelector('input.filepond');
                const pond = initializeImagePond(imageInput);

                // Handle the modal trigger for add and edit action
                let mode = 'create'
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {

                    button.addEventListener('click', function() {
                        // clear form If mode was edit
                        if (mode === 'edit') resetForm(pond);

                        let actionUrl = button.getAttribute('data-action');
                        let training = JSON.parse(button.getAttribute('data-training'));
                        mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            resetValidation();

                            document.getElementById('formModalLabel').textContent = 'Ubah Pelatihan';
                            document.getElementById('trainingForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(training, pond);
                        } else {
                            // Set to Add training if no action URL is provided
                            document.getElementById('formModalLabel').textContent = 'Tambah Pelatihan';
                            document.getElementById('trainingForm').setAttribute('action',
                                '{{ route('training.store') }}');
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';
                        }

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deletetrainingForm').setAttribute('action', actionUrl);
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
