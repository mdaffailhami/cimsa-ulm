<x-layout.master>
    @section('title', 'Manajemen Konten Halaman')

    <h1 class="h3 mb-3"><strong>Manajemen Konten Halaman {{ $page->name }}</h1>

    <div class="row">
        {{-- Content Form  --}}
        <div class="col-md-12">
            <div class="card flex-fill">
                <div class="card-header ">
                    <h5 class="card-title">Konten</h5>
                </div>

                <div class="card-body">
                    <form id="contentForm" action="{{ route('page.update', ['page' => $page->uuid]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="form_category" name="form_category" value="content">


                        <button type="submit" id='content-submit-btn' class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="col-md-12">
            <div class="card flex-fill">
                <div class="card-header ">
                    <h5 class="card-title">Narahubung</h5>
                </div>

                <div class="card-body">
                    <!-- Add Halaman Form -->
                    <form id="contactForm" action="{{ route('page.update', ['page' => $page->uuid]) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <input type="hidden" id="form_category" name="form_category" value="contact">
                        <input type="hidden" id="page_contact_id" name="page_contact_id"
                            value="{{ $page->contact->id ?? null }}">

                        <div class="row mb-3">
                            <label for="contact_name" class="col-sm-2 col-form-label">Nama Narahubung</label>
                            <div class="col-sm-6">
                                <input type="contact_name"
                                    class="form-control @error('contact_name') is-invalid @enderror" id="contact_name"
                                    name="contact_name" placeholder="Masukkan nama..."
                                    value="{{ $page->contact->name ?? '' }}" required>
                            </div>
                            @error('contact_name')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="contact_email" class="col-sm-2 col-form-label">Email Narahubung</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control @error('contact_email') is-invalid @enderror"
                                    id="contact_email" name="contact_email" placeholder="Masukkan email..."
                                    value="{{ $page->contact->email ?? '' }}" required>
                            </div>
                            @error('contact_email')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="contact_phone" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('contact_phone') is-invalid @enderror"
                                    id="contact_phone" name="contact_phone" placeholder="Masukkan Nomor telepon..."
                                    value="{{ $page->contact->phone ?? '' }}" required>
                            </div>
                            @error('contact_phone')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="contact_occupation" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-6">
                                <input type="text"
                                    class="form-control @error('contact_occupation') is-invalid @enderror"
                                    id="contact_occupation" name="contact_occupation" placeholder="Masukkan jabatan..."
                                    value="{{ $page->contact->occupation ?? '' }}" required>
                            </div>
                            @error('contact_occupation')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="contact_year" class="col-sm-2 col-form-label">Tahun Angkatan</label>
                            <div class="col-sm-6">
                                <select id="contact_year" name="contact_year" class="form-select">
                                    <option selected disabled>Pilih Tahun</option>
                                </select>
                            </div>
                            @error('contact_year')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="avatar" class="col-sm-2 col-form-label">Foto narahubung</label>
                            <div class="col-sm-6">
                                <input type="file" class="filepond" id="avatar" name="avatar" accept="image/*">
                            </div>
                            @error('avatar')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Profil Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Data Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Profile Form -->
                        <form id="profileForm" action="#" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">


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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Data Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data profil ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deleteProfileForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')
        <script>
            const createContentInput = (content, index) => {

                const inputContainer = document.createElement('div');
                inputContainer.className = 'row mb-3';

                // ID Input
                const inputId = document.createElement('input');
                inputId.type = 'hidden';
                inputId.name = `data[${index}][id]`;
                inputId.value = content.uuid;

                const inputLabel = document.createElement('label');
                inputLabel.className = "col-sm-2 col-form-label"
                inputLabel.innerText = content.label;
                inputLabel.for = `data[${index}][value]`

                const inputWrapper = document.createElement('div');
                inputWrapper.className = 'col-sm-6'

                let inputValue;
                // Handling Different Input Types
                if (content.type === 'text' || content.type === 'long-text') {
                    inputValue = document.createElement('textarea'); // Use <textarea> for both text and long_text
                    inputValue.rows = content.type === 'long-text' ? 3 : 1; // Adjust height based on type
                    inputValue.value = content?.text_content || content?.long_text_content || '';
                    inputValue.placeholder = `Masukkan ${content.label}`;
                } else if (content.type === 'image') {
                    inputValue = document.createElement('input');
                    inputValue.type = 'file';
                    inputValue.accept = 'image/*';
                }

                inputValue.className = 'form-control';
                inputValue.id = `data[${index}][value]`
                inputValue.name = content.type === 'multiple-image' ? `data[${index}][values][]` : `data[${index}][value]`

                inputWrapper.appendChild(inputValue);

                inputContainer.appendChild(inputId);
                inputContainer.appendChild(inputLabel);
                inputContainer.appendChild(inputWrapper);

                return inputContainer;
            }

            const initializeContentForm = (contents) => {

                // Initialize Form Container
                const formContainer = document.getElementById('contentForm');
                const mainSubmitBtn = document.getElementById('content-submit-btn')

                // Generate Form Input Field
                contents.forEach(async (content, index) => {
                    const contentInput = createContentInput(content, index);

                    formContainer.insertBefore(contentInput, mainSubmitBtn);

                    // Initialize File Pond for Image Field Type
                    if (content.type === 'image' || content.type === 'multiple-image') {
                        console.log(content);


                        const imageInput = document.getElementById(`data[${index}][value]`)
                        let is_multiple = content.type === 'image' ? false : true;
                        let max_file = content.type === 'image' ? 1 : 3;
                        const image_pond = initializeImagePond(imageInput, is_multiple, max_file);

                        if (content.galleries && content.galleries.length > 0) {
                            const galleryFiles = content.galleries.map(gallery => {

                                let image_path = gallery?.url?.split('image/')[1];
                                return {
                                    source: image_path,
                                    options: {
                                        type: 'local'
                                    }
                                };
                            });

                            image_pond.setOptions({
                                files: galleryFiles
                            });
                        }
                    }

                    // Initialize CKeditor for Long Text Field Type
                    else if (content.type === 'long-text') {
                        const textInput = document.getElementById(`data[${index}][value]`)
                        let editor = await InitializeCKEditor(textInput);
                        editor.setData(content.long_text_content || '')
                    }

                })
            }

            const initializeContactForm = (contact) => {
                // Initialize Year
                const contact_year = document.getElementById('contact_year');

                getYear(contact_year, contact?.year);

                // Initialize Filepond
                const avatar_input = document.querySelector('#avatar');
                const avatar_pond = initializeImagePond(avatar_input, false, 1)

                if (contact) {
                    document.getElementById('contact_name').value = contact?.name;
                    document.getElementById('contact_email').value = contact?.email;
                    document.getElementById('contact_phone').value = contact?.phone;
                    document.getElementById('contact_occupation').value = contact?.occupation;

                    // Set avatar_input
                    let avatar_path = contact?.image?.split('image/')[1];

                    // Add the existing file using the image URL
                    avatar_pond.setOptions({
                        files: [{
                            source: avatar_path,
                            options: {
                                type: 'local',
                            }
                        }, ]
                    })
                }
            }

            document.addEventListener('DOMContentLoaded', async function() {

                let page = @json($page);

                let contents = page.contents;
                let contact = page.contact;

                initializeContentForm(contents)
                initializeContactForm(contact)

                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteFormModal"]').forEach(function(button) {
                    button.addEventListener('click', async function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deleteProfileForm').setAttribute('action',
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
