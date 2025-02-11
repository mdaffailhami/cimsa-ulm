<x-layout.master>
    @section('title', 'Manajemen Konten Halaman')

    <div class="d-flex align-items-center mb-3" style="gap: 8px">
        <a href="{{ route('page.index') }}" class="text-dark">
            <i class="align-middle" data-feather="arrow-left"></i>
        </a>
        <h1 class="h3 m-0"><strong>Manajemen Konten Halaman {{ $page->name }}</h1>
    </div>




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
                                    <div class="invalid-feedback d-inline-block">
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
                                    <div class="invalid-feedback d-inline-block">
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
                                    <div class="invalid-feedback d-inline-block">
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
                                    <div class="invalid-feedback d-inline-block">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="contact_year" class="col-sm-2 col-form-label">Tahun Angkatan</label>
                            <div class="col-sm-6">
                                <select id="contact_year" name="contact_year"
                                    class="form-select @error('contact_year') is-invalid @enderror">
                                    <option selected disabled>Pilih Tahun</option>
                                </select>
                            </div>
                            @error('contact_year')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback d-inline-block">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="avatar" class="col-sm-2 col-form-label">Foto narahubung</label>
                            <div class="col-sm-6">
                                <input type="file"
                                    class="filepond form-control @error('avatar') is-invalid @enderror" id="avatar"
                                    name="avatar" accept="image/*">
                            </div>
                            @error('avatar')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback d-inline-block">
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
                inputLabel.for = content.type === 'multiple-image' ?
                    `data[${index}][values][]` : `data[${index}][value]`

                const inputWrapper = document.createElement('div');
                inputWrapper.className = 'col-sm-6'

                // If type is multiple value

                if (content.type === 'multiple-value') {
                    const multipleInputWrapper = document.createElement('div')
                    multipleInputWrapper.className = 'p-3 border rounded';

                    const sub_contents = JSON.parse(content.multiple_value_content)
                    sub_contents.forEach(async (sub_content, sub_index) => {
                        let sub_name_index = `data[${index}][values][${sub_index}]`
                        let subContentInputElement = createSubContentInput(sub_content, sub_name_index)
                        multipleInputWrapper.appendChild(subContentInputElement);
                    });

                    inputWrapper.appendChild(multipleInputWrapper);

                } else {
                    let inputElement;

                    // Handling Different Input Types
                    if (content.type === 'text' || content.type === 'long-text') {
                        inputElement = document.createElement('textarea'); // Use <textarea> for both text and long_text
                        inputElement.rows = content.type === 'long-text' ? 3 : 2; // Adjust height based on type
                        inputElement.value = content?.text_content || content?.long_text_content || '';
                        inputElement.placeholder = `Masukkan ${content.label}`;
                    } else if (content.type === 'image' || content.type === 'multiple-image') {
                        inputElement = document.createElement('input');
                        inputElement.type = 'file';
                        inputElement.accept = 'image/*';
                    }

                    inputElement.className = 'form-control';
                    inputElement.id = `data[${index}][value]`
                    inputElement.name = content.type === 'multiple-image' ?
                        `data[${index}][values][]` : `data[${index}][value]`

                    inputWrapper.appendChild(inputElement);
                }




                inputContainer.appendChild(inputId);
                inputContainer.appendChild(inputLabel);
                inputContainer.appendChild(inputWrapper);

                return inputContainer;
            }

            const createSubContentInput = (sub_content, sub_name_index) => {
                const subContentWrapper = document.createElement('div');
                subContentWrapper.className = 'mb-3 sub-content-input';

                subContentLabel = document.createElement('input');
                subContentLabel.type = 'hidden';
                subContentLabel.name = `${sub_name_index}[label]`;
                subContentLabel.value = sub_content.label;

                subContentType = document.createElement('input');
                subContentType.type = 'hidden';
                subContentType.name = `${sub_name_index}[type]`;
                subContentType.value = sub_content.type;

                const subContentInputLabel = document.createElement('label');
                subContentInputLabel.innerText = sub_content.label;
                subContentInputLabel.className = '';
                subContentInputLabel.for = sub_name_index

                let subContentInputElement;

                if (sub_content.type === 'long-text') {
                    subContentInputElement = document.createElement('textarea');
                } else {
                    subContentInputElement = document.createElement('input');
                    subContentInputElement.type = 'text';
                }

                subContentInputElement.value = sub_content?.value || '';
                subContentInputElement.placeholder = `Masukkan ${sub_content.label}`;
                subContentInputElement.className = 'form-control';
                subContentInputElement.id = `${sub_name_index}[value]`
                subContentInputElement.name = `${sub_name_index}[value]`

                // Append elements to the subContent wrapper
                subContentWrapper.appendChild(subContentLabel);
                subContentWrapper.appendChild(subContentType);
                subContentWrapper.appendChild(subContentInputLabel);
                subContentWrapper.appendChild(subContentInputElement);
                // subContentWrapper.appendChild(removeBtn);



                return subContentWrapper;
            };

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

                    // Initialize CKeditor for Multiple Value
                    else if (content.type === 'multiple-value') {
                        const sub_contents = JSON.parse(content.multiple_value_content)
                        sub_contents.forEach(async (sub_content, sub_index) => {
                            if (sub_content.type === 'long-text') {
                                const subTextInput = document.getElementById(
                                    `data[${index}][values][${sub_index}][value]`)

                                let subEditor = await InitializeCKEditor(subTextInput);
                                subEditor.setData(sub_content.value || '')
                            }
                        });
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
                        title: 'Validasi Gagal!',
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

                    });;


                });
            </script>
        @endif
    @endsection
</x-layout.master>
