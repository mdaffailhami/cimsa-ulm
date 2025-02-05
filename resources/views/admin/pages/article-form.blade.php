<x-layout.master>
    @if (isset($post))
        @section('title', 'Ubah Artikel')
    @else
        @section('title', 'Tambah Artikel')
    @endif

    <div class="d-flex align-items-center mb-3" style="gap: 8px">
        <a href="{{ route('article.index') }}" class="text-dark">
            <i class="align-middle" data-feather="arrow-left"></i>
        </a>
        <h1 class="h3 m-0"><strong>{{ isset($post) ? 'Ubah Artikel' : 'Tambah Artikel' }}</strong></h1>
    </div>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Formulir Data Artikel</h5>
                </div>

                <div class="card-body">
                    <!-- Article Form -->
                    <form id="articleForm"
                        action="{{ isset($post) ? route('article.update', ['article' => $post->uuid]) : route('article.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($post))
                            @method('PUT')
                        @endif

                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Judul Artikel</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" placeholder="Masukkan Judul..."
                                    value="{{ old('title') ?? (isset($post) ? $post->title : '') }}" required>
                            </div>
                            @error('title')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="highlight" class="col-sm-2 col-form-label">Ringkasan Artikel</label>
                            <div class="col-sm-6">
                                <textarea class="form-control @error('highlight') is-invalid @enderror" placeholder="Masukkan deskripsi..."
                                    id="highlight" name="highlight" style="height: 100px">{{ old('highlight') ?? (isset($post) ? $post->highlight : '') }}</textarea>
                            </div>
                            @error('highlight')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Konten</label>
                            <div class="col-sm-8">
                                <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Masukkan Konten..." id="content"
                                    name="content" style="height: 100px">{{ old('content') ?? (isset($post) ? $post->content : '') }}</textarea>
                            </div>
                            @error('content')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="cover" class="col-sm-2 col-form-label">Sampul Artikel</label>
                            <div class="col-sm-6">
                                <input type="file" class="filepond" id="cover" name="cover" accept="image/*">
                            </div>
                            @error('cover')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="categories" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-6">
                                <select id="categories" name="categories[]" class="form-control" multiple>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button id="submitButton" type="submit" class="btn btn-primary"
                                style="min-width: 200px !important">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')
        <script>
            const getCategoryOptions = () => {
                const categories = @json($categories);

                return categories.map((category) => {
                    return {
                        value: category.name,
                        label: category.name,
                    }
                })
            }

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

            document.addEventListener('DOMContentLoaded', async function() {
                const article = @json(isset($post) ? $post : null);
                const categories = @json($categories);

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

                if (article) {
                    fillForm(article, choices, pond, contentEditor);
                }

                options = getCategoryOptions();
                console.log(options);

                choices.setChoices(options)
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
