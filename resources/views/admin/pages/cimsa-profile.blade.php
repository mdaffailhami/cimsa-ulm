<x-layout.master>
    @section('title', 'Manajemen Profil')

    <h1 class="h3 mb-3"><strong>Manajemen Profil</h1>

    <div class="row">
        {{-- Profile Form  --}}
        <div class="col-md-12">
            <div class="card flex-fill">
                <div class="card-header ">
                    <h5 class="card-title">Profile </h5>
                </div>

                <div class="card-body">
                    <form id="mainForm" action="{{ route('cimsa-profile.update-new') }}" method="POST">
                        @method('PUT')
                        @csrf

                        {{-- Generate Other form field based by profile data --}}

                        <div id="socialMediaField" class="row mb-3">
                            <label class="col-sm-2 col-form-label">Sosial Media</label>
                            <div class="col-sm-6">
                                <div id="social-media-container">
                                    <!-- Dynamic SocialMedia inputs will be appended here -->
                                </div>
                                <button type="button" class="btn btn-success mt-2" id="add-social-media-btn">Tambah
                                    Sosial Media</button>
                            </div>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Profile Form -->
                        <form id="profileForm" action="{{ route('cimsa-profile.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">


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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus Data Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            const generateSocialMediaPlatform = (container, default_value = null) => {
                const platforms = [

                    {
                        value: 'facebook',
                        label: "Facebook"
                    },
                    {
                        value: 'instagram',
                        label: "Instagram"
                    },
                    {
                        value: 'twitter',
                        label: "Twitter"
                    },
                    {
                        value: 'thread',
                        label: "Thread"
                    },
                    {
                        value: 'youtube',
                        label: "Youtube"
                    },
                    {
                        value: 'tiktok',
                        label: "Tiktok"
                    },

                ]

                for (const platform of platforms) {
                    const option = document.createElement("option");
                    option.value = platform.value;
                    option.textContent = platform.label;

                    if (platform.value === default_value) {
                        option.selected = true;
                    }

                    container.appendChild(option)
                }
            }

            const createProfileInput = (profile, index) => {

                const inputContainer = document.createElement('div');
                inputContainer.className = 'row mb-3';

                // ID Input
                const inputId = document.createElement('input');
                inputId.type = 'hidden';
                inputId.name = `data[${index}][id]`;
                inputId.value = profile.uuid;

                const inputLabel = document.createElement('label');
                inputLabel.className = "col-sm-2 col-form-label"
                inputLabel.innerText = profile.label;
                inputLabel.for = `data[${index}][value]`

                const inputWrapper = document.createElement('div');
                inputWrapper.className = 'col-sm-6'

                let inputValue;
                // Handling Different Input Types
                if (profile.type === 'text' || profile.type === 'long-text') {
                    inputValue = document.createElement('textarea'); // Use <textarea> for both text and long_text
                    inputValue.rows = profile.type === 'long-text' ? 3 : 1; // Adjust height based on type
                    inputValue.value = profile?.text_content || profile?.long_text_content || '';
                    inputValue.placeholder = `Masukkan ${profile.label}`;
                } else if (profile.type === 'image') {
                    inputValue = document.createElement('input');
                    inputValue.type = 'file';
                    inputValue.accept = 'image/*';
                }

                inputValue.className = 'form-control';
                inputValue.id = `data[${index}][value]`
                inputValue.name = profile.type === 'multiple-image' ? `data[${index}][values][]` : `data[${index}][value]`

                inputWrapper.appendChild(inputValue);

                inputContainer.appendChild(inputId);
                inputContainer.appendChild(inputLabel);
                inputContainer.appendChild(inputWrapper);

                return inputContainer;
            }

            const createSocialMediaInput = (social_media = null, socialMediaContainer) => {
                const socialMedia = document.createElement('div');
                socialMedia.className = 'mb-3 border p-3 rounded social-media-input';

                // Generate a unique index for this SocialMedia
                const socialMediaIndex = socialMediaContainer.children.length;

                // ID Input
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = `social_medias[${socialMediaIndex}][id]`; // Use the same index for id and description
                idInput.value = social_media?.id || null;

                // Social Media Type input
                const platformGroup = document.createElement('div');
                platformGroup.className = 'mb-2';
                const platformLabel = document.createElement('label');
                platformLabel.innerText = 'Platform';
                platformLabel.className = 'form-label';
                const platformInput = document.createElement('select');
                platformInput.id = `social_medias[${socialMediaIndex}][platform]`;
                platformInput.name = `social_medias[${socialMediaIndex}][platform]`;
                platformInput.className = 'form-select';

                const defaultOption = document.createElement('option');
                defaultOption.innerText = "Pililh platform media sosial"
                defaultOption.value = "";
                defaultOption.disabled = true;
                defaultOption.selected = true;
                platformInput.appendChild(defaultOption);

                generateSocialMediaPlatform(platformInput, social_media?.platform)

                platformGroup.appendChild(platformLabel);
                platformGroup.appendChild(platformInput);

                // Url input
                const urlGroup = document.createElement('div');
                urlGroup.className = 'mb-2';
                const urlLabel = document.createElement('label');
                urlLabel.innerText = 'Url';
                urlLabel.className = 'form-label';
                const urlInput = document.createElement('input');
                urlInput.type = 'text';
                urlInput.name = `social_medias[${socialMediaIndex}][url]`; // Use the same index for url and description
                urlInput.className = 'form-control';
                urlInput.placeholder = 'Masukan link sosial media...';
                urlInput.value = social_media?.url || '';
                urlGroup.appendChild(urlLabel);
                urlGroup.appendChild(urlInput);

                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-danger mt-2';
                removeBtn.innerHTML = 'Hapus';
                removeBtn.addEventListener('click', () => {
                    // Ensure at least one SocialMedia input remains
                    if (socialMediaContainer.children.length > 1) {
                        socialMedia.remove();
                    }
                });

                // Append inputs and button to the SocialMedia wrapper
                socialMedia.appendChild(idInput);
                socialMedia.appendChild(platformGroup);
                socialMedia.appendChild(urlGroup);
                socialMedia.appendChild(removeBtn);

                return socialMedia;
            };

            const initializeDefaultSocialMedia = (activitiesContainer) => {
                const defaultSocialMediaInput = createSocialMediaInput(null, activitiesContainer);
                activitiesContainer.appendChild(defaultSocialMediaInput);
            };

            document.addEventListener('DOMContentLoaded', async function() {

                let profiles = @json($profiles);
                let social_medias = @json($social_medias);

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

                // Initialize Form Container
                const formContainer = document.getElementById('mainForm');
                // Initialize Social Media Field
                const socialMediaField = document.getElementById('socialMediaField');

                // Generate Form Input Field
                profiles.forEach(async (profile, index) => {
                    const profileInput = createProfileInput(profile, index);

                    formContainer.insertBefore(profileInput, socialMediaField)

                    // Initialize File Pond for Image Field Type
                    if (profile.type === 'image' || profile.type === 'multiple-image') {

                        const imageInput = document.getElementById(`data[${index}][value]`)
                        let is_multiple = profile.type === 'image' ? false : true;
                        let max_file = profile.type === 'image' ? 1 : 3;
                        const image_pond = initializeImagePond(imageInput, is_multiple, max_file);

                        if (profile.galleries && profile.galleries.length > 0) {
                            const galleryFiles = profile.galleries.map(gallery => {

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
                    else if (profile.type === 'long-text') {
                        const textInput = document.getElementById(`data[${index}][value]`)
                        let editor = await InitializeCKEditor(textInput);
                        editor.setData(profile.long_text_content || '')
                    }

                    // Fill 
                })

                // Initialize Social Media Container
                const socialMediaContainer = document.getElementById('social-media-container');
                const addSocialMediaBtn = document.getElementById('add-social-media-btn');

                // Add a new activities input on button click
                addSocialMediaBtn.addEventListener('click', () => {
                    const newSocialMedia = createSocialMediaInput(null, socialMediaContainer);
                    socialMediaContainer.appendChild(newSocialMedia);
                });

                // Pre-fill Social Media Input
                // Add social media if available, otherwise add the default social media input
                if (social_medias.length > 0) {
                    social_medias.forEach((social_media) => {
                        const socialMediaInput = createSocialMediaInput(social_media,
                            socialMediaContainer);
                        socialMediaContainer.appendChild(socialMediaInput);
                    });
                } else {
                    initializeDefaultSocialMedia(
                        socialMediaContainer); // Add a default input if no social media exist
                }

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
