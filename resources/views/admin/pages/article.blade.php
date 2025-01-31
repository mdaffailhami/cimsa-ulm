<x-layout.master>
    @section('title', 'Manajemen Artikel')

    <h1 class="h3 mb-3"><strong>Manajemen Artikel</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Artikel</h5>

                    {{-- Add Button --}}
                    <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#formModal" data-mode="create">
                        Tambah Artikel<i class="ms-2 align-middle" data-feather="plus"></i>
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="d-none d-xl-table-cell">Judul</th>
                                <th class="d-none d-xl-table-cell">Penulis</th>
                                <th class="d-none d-xl-table-cell">Highlight</th>
                                <th class="d-none d-xl-table-cell">Cover</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="d-none d-xl-table-cell">{{ $post->title }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $post->author->full_name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $post->highlight }}</td>
                                    <td class="">
                                        <img src="{{ $post->cover }}" class="img-thumbnail" style="width: 300px"
                                            alt="{{ $post->slug }}">
                                    </td>
                                    <td class="">
                                        <div class="d-flex justify-content-evenly">
                                            {{-- Preview Button --}}
                                            <button type="button" class="btn btn-info disabled" data-bs-toggle="modal"
                                                data-bs-target="#formModal" data-mode="edit"
                                                data-action="{{ route('article.show', ['article' => $post->slug]) }}">
                                                <i class="align-middle" data-feather="eye"></i>
                                            </button>

                                            {{-- Edit Button --}}
                                            <button type="button" class="btn btn-warning text-dark "
                                                data-bs-toggle="modal" data-bs-target="#formModal" data-mode="edit"
                                                data-action="{{ route('article.update', ['article' => $post->uuid]) }}"
                                                data-article="{{ json_encode($post) }}">
                                                <i class="align-middle" data-feather="edit"></i>
                                            </button>

                                            <!-- Delete Button -->
                                            <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                                data-bs-target="#deleteFormModal"
                                                data-action="{{ route('article.destroy', ['article' => $post->uuid]) }}">
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
                        {{ $posts->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- Artikel Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Article Form -->
                        <form id="articleForm" action="{{ route('article.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="title" class="form-label">Judul Artikel</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" placeholder="Masukkan Judul..."
                                    value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="highlight" class="form-label">Ringkasan Artikel</label>
                                <textarea class="form-control @error('highlight') is-invalid @enderror" placeholder="Masukkan ringkasan..."
                                    id="highlight" name="highlight" value="{{ old('highlight') }}" required style="height: 100px"></textarea>
                                @error('highlight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Konten</label>
                                <textarea class="form-control ckeditor @error('content') is-invalid @enderror" placeholder="Masukkan ringkasan..."
                                    id="content" name="content" value="{{ old('content') }}" style="height: 100px"></textarea>
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cover" class="form-label">Sampul Artikel</label>
                                <input type="file" class="filepond" id="cover" name="cover"
                                    accept="image/*">
                            </div>

                            <div class="mb-3">
                                <label for="categories" class="form-label">Kategori</label>
                                <select id="categories" name="categories[]" class="form-control" multiple>
                                </select>
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus article ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deletearticleForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')
        <script>
            const fillForm = (article, choices, filePond, contentEditor) => {
                // Pre-fill the form fields if editing a article
                document.getElementById('title').value = article.title;
                document.getElementById('highlight').value = article.highlight;
                document.getElementById('content').value = article.content;

                // Get the categories of the article
                const article_categories = article.categories.map(category => category
                    .name);

                choices.clearStore(); // Clear internal Choices.js data
                choices.setValue(article_categories); // Clear selected values

                // Clear previous files in FilePond
                filePond.removeFiles();

                let file_path = article.cover.split('image/')[1];

                // Add the existing file using the image URL
                filePond.setOptions({
                    files: [{
                        source: file_path,
                        options: {
                            type: 'local',
                        }
                    }, ]
                })

                // Update CKEditor value
                contentEditor.setData(article.content)
            }

            const resetForm = () => {
                // Pre-fill the form fields if editing a article
                document.getElementById('title').value = '';
            }

            const getOptions = () => {
                const categories = @json($categories);

                return categories.map((category) => {
                    return {
                        value: category.name,
                        label: category.name,
                    }
                })
            }

            document.addEventListener('DOMContentLoaded', async function() {

                // Initialize Tooltip
                let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Initialize Choice
                choices = new Choices('#categories', {
                    removeItemButton: true,
                    placeholderValue: 'Pilih Kategori',
                    searchPlaceholderValue: 'Cari Kategori'
                });

                // Initialize Filepond
                const imageInput = document.querySelector('#cover');
                const pond = initializeImagePond(imageInput);
                // Initialize CKEditor
                let contentInput = document.getElementById('content');
                let contentEditor = await InitializeCKEditor(contentInput);

                // Handle the modal trigger for add and edit action
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        let article = JSON.parse(button.getAttribute('data-article'));
                        let mode = button.getAttribute('data-mode');
                        let options = getOptions();

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            document.getElementById('formModalLabel').textContent = 'Edit Artikel';
                            document.getElementById('articleForm').setAttribute('action',
                                actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(article, choices, pond, contentEditor);

                        } else {
                            // Set to Add article if no action URL is provided
                            document.getElementById('formModalLabel').textContent =
                                'Tambah Artikel';
                            document.getElementById('articleForm').setAttribute('action',
                                '{{ route('article.store') }}');
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';

                            choices.clearStore(); // Clear internal Choices.js data
                            choices.setValue([]); // Clear selected values
                        }

                        choices.setChoices(options);

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', async function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deletearticleForm').setAttribute('action',
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
                        title: 'Validation Error!',
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
