<x-layout.master>
    @section('title', 'Detail Komite')

    <div class="d-flex align-items-center mb-3" style="gap: 8px">
        <a href="{{ route('committe.index') }}" class="text-dark">
            <i class="align-middle" data-feather="arrow-left"></i>
        </a>
        <h1 class="h3 m-0"><strong>{{ $committe->name }}</strong></h1>
    </div>

    <div class="row">
        {{-- Profile Komite --}}
        <div class="col-md-12">
            <div class="card flex-fill">
                <div class="card-header ">
                    <h5 class="card-title">Profile {{ $committe->name }}</h5>
                </div>

                <div class="card-body">
                    <form id="profileForm" action="{{ route('committe.update', ['committe' => $committe->uuid]) }}"
                        method="POST">
                        @method('PUT')
                        @csrf

                        <input type="hidden" id="form_category" name="form_category" value="profile">

                        <div class="row mb-3">
                            <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-6">
                                <input type="file" class="filepond" id="logo" name="logo" accept="image/*">
                            </div>
                            @error('logo')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nama Komite</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan nama..."
                                    value="{{ $committe->name }}" required>
                            </div>
                            @error('name')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                            <div class="col-sm-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan deskripsi..."
                                    id="description" name="description" required style="height: 100px">{{ $committe->description }}</textarea>
                            </div>
                            @error('description')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="long_description" class="col-sm-2 col-form-label">Deskripsi Panjang</label>
                            <div class="col-sm-6">
                                <textarea class="form-control @error('long_description') is-invalid @enderror" placeholder="Masukkan deskripsi..."
                                    id="long_description" name="long_description">{{ $committe->long_description }}</textarea>
                            </div>
                            @error('long_description')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="mission" class="col-sm-2 col-form-label">Misi</label>
                            <div class="col-sm-6">
                                <textarea class="form-control @error('mission') is-invalid @enderror" placeholder="Masukkan misi..." id="mission"
                                    name="mission">{{ $committe->mission }}</textarea>
                            </div>
                            @error('mission')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="background" class="col-sm-2 col-form-label">Latar Belakang</label>
                            <div class="col-sm-6">
                                <input type="file" class="filepond" id="background" name="background"
                                    accept="image/*">
                            </div>
                            @error('background')
                                <div class="col-sm-6 offset-sm-2">
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="focuses" class="col-sm-2 col-form-label">Fokus Area</label>
                            <div class="col-sm-6">
                                <div id="focuses-container">
                                    <!-- Dynamic inputs will be appended here -->
                                </div>
                                <button type="button" class="btn btn-success mt-2" id="add-focus-btn">Tambah Fokus
                                    Area</button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Aktivitas Mendatang</label>
                            <div class="col-sm-6">
                                <div id="activities-container">
                                    <!-- Dynamic activity inputs will be appended here -->
                                </div>
                                <button type="button" class="btn btn-success mt-2" id="add-activity-btn">Tambah
                                    Aktivitas</button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gallery" class="col-sm-2 col-form-label">Galeri Kegiatan</label>
                            <div class="col-sm-6">
                                <input type="file" class="filepond" id="gallery" name="galleries[]"
                                    accept="image/*">
                            </div>
                            @error('gallery')
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

        {{-- Profile Testimoni --}}
        <div class="col-md-12">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Testimoni {{ $committe->name }}</h5>
                    <button id="add-testimony" type="button" class="btn btn-primary">Tambah
                        Testimoni</button>
                </div>

                <div class="card-body">
                    <!-- Add Testimoni Form -->
                    <form id="profileForm" action="{{ route('committe.update', ['committe' => $committe->uuid]) }}"
                        method="POST">
                        @method('PUT')
                        @csrf

                        <input type="hidden" id="form_category" name="form_category" value="testimony">

                        <div id="testimonies-container">

                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Narahubung Komite --}}
        <div class="col-md-12">
            <div class="card flex-fill">
                <div class="card-header ">
                    <h5 class="card-title">Narahubung {{ $committe->name }}</h5>
                </div>

                <div class="card-body">
                    <!-- Add Komite Form -->
                    <form id="contactForm" action="{{ route('committe.update', ['committe' => $committe->uuid]) }}"
                        method="POST">
                        @method('PUT')
                        @csrf

                        <input type="hidden" id="form_category" name="form_category" value="contact">
                        <input type="hidden" id="page_contact_id" name="page_contact_id"
                            value="{{ $committe->contact->id ?? null }}">

                        <div class="row mb-3">
                            <label for="contact_name" class="col-sm-2 col-form-label">Nama Narahubung</label>
                            <div class="col-sm-6">
                                <input type="contact_name"
                                    class="form-control @error('contact_name') is-invalid @enderror" id="contact_name"
                                    name="contact_name" placeholder="Masukkan nama..."
                                    value="{{ $committe->contact->name ?? '' }}" required>
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
                                <input type="email"
                                    class="form-control @error('contact_email') is-invalid @enderror"
                                    id="contact_email" name="contact_email" placeholder="Masukkan email..."
                                    value="{{ $committe->contact->email ?? '' }}" required>
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
                                <input type="text"
                                    class="form-control @error('contact_phone') is-invalid @enderror"
                                    id="contact_phone" name="contact_phone" placeholder="Masukkan Nomor telepon..."
                                    value="{{ $committe->contact->phone ?? '' }}" required>
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
                                    id="contact_occupation" name="contact_occupation"
                                    placeholder="Masukkan jabatan..."
                                    value="{{ $committe->contact->occupation ?? '' }}" required>
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
                                <input type="file" class="filepond" id="avatar" name="avatar"
                                    accept="image/*">
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
    </div>

    @section('scripts')

        {{-- Profile Form --}}
        <script>
            const createFocusInput = (focus = null, focusesContainer) => {
                const focusWrapper = document.createElement('div');
                focusWrapper.className = 'input-group mb-2';

                // Generate a unique index for this focus
                const focusIndex = focusesContainer.children.length;

                // id input field
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = `focuses[${focusIndex}][id]`;
                idInput.value = focus?.id || null;

                // description input field
                const descriptionInput = document.createElement('input');
                descriptionInput.type = 'text';
                descriptionInput.name = `focuses[${focusIndex}][description]`;
                descriptionInput.className = 'form-control';
                descriptionInput.placeholder = 'Masukkan fokus area...';
                descriptionInput.value = focus?.description || '';

                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-danger';
                removeBtn.innerHTML = 'Remove';

                // Remove focus input on button click
                removeBtn.addEventListener('click', () => {
                    // Only remove if there is more than one focus input
                    if (focusesContainer.children.length > 1) {
                        focusWrapper.remove();
                    }
                });

                // Append input and remove button to wrapper
                focusWrapper.appendChild(idInput);
                focusWrapper.appendChild(descriptionInput);
                focusWrapper.appendChild(removeBtn);

                return focusWrapper;
            };

            const createActivityInput = (activity = null, activitiesContainer) => {
                const activityWrapper = document.createElement('div');
                activityWrapper.className = 'mb-3 border p-3 rounded activity-input';

                // Generate a unique index for this activity
                const activityIndex = activitiesContainer.children.length;

                // ID Input
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = `activities[${activityIndex}][id]`; // Use the same index for id and description
                idInput.value = activity?.id || null;

                // Title input
                const nameGroup = document.createElement('div');
                nameGroup.className = 'mb-2';
                const nameLabel = document.createElement('label');
                nameLabel.innerText = 'Name';
                nameLabel.className = 'form-label';
                const nameInput = document.createElement('input');
                nameInput.type = 'text';
                nameInput.name = `activities[${activityIndex}][name]`; // Use the same index for name and description
                nameInput.className = 'form-control';
                nameInput.placeholder = 'Enter activity name...';
                nameInput.value = activity?.name || '';
                nameGroup.appendChild(nameLabel);
                nameGroup.appendChild(nameInput);

                // Description textarea
                const descriptionGroup = document.createElement('div');
                const descriptionLabel = document.createElement('label');
                descriptionLabel.innerText = 'Description';
                descriptionLabel.className = 'form-label';
                const descriptionTextarea = document.createElement('textarea');
                descriptionTextarea.name =
                    `activities[${activityIndex}][description]`; // Use the same index for name and description
                descriptionTextarea.className = 'form-control';
                descriptionTextarea.placeholder = 'Enter activity description...';
                descriptionTextarea.rows = 3;
                descriptionTextarea.value = activity?.description || '';
                descriptionGroup.appendChild(descriptionLabel);
                descriptionGroup.appendChild(descriptionTextarea);

                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-danger mt-2';
                removeBtn.innerHTML = 'Remove Activity';
                removeBtn.addEventListener('click', () => {
                    // Ensure at least one activity input remains
                    if (activitiesContainer.children.length > 1) {
                        activityWrapper.remove();
                    }
                });

                // Append inputs and button to the activity wrapper
                activityWrapper.appendChild(idInput);
                activityWrapper.appendChild(nameGroup);
                activityWrapper.appendChild(descriptionGroup);
                activityWrapper.appendChild(removeBtn);

                return activityWrapper;
            };

            const createTestimonyInput = (testimony = null, testimoniesContainer) => {
                const testimonyWrapper = document.createElement('div');
                testimonyWrapper.className = 'mb-3 border p-3 rounded testimony-input';

                // Generate a unique index for this testimony
                const testimonyIndex = testimoniesContainer.children.length;

                // Label for testimony section
                const testimonyLabel = document.createElement('h5');
                testimonyLabel.innerText = `Testimoni ${testimonyIndex + 1}`;
                testimonyLabel.className = 'mb-2';

                // ID Input (Hidden)
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = `testimonies[${testimonyIndex}][id]`;
                idInput.value = testimony?.id || '';

                // Name Input
                const nameGroup = document.createElement('div');
                nameGroup.className = 'row mb-3';
                const nameLabel = document.createElement('label');
                nameLabel.innerText = 'Nama';
                nameLabel.className = 'col-sm-2 col-form-label';
                const nameInputWrapper = document.createElement('div');
                nameInputWrapper.className = 'col-sm-6';
                const nameInput = document.createElement('input');
                nameInput.type = 'text';
                nameInput.name = `testimonies[${testimonyIndex}][name]`;
                nameInput.className = 'form-control';
                nameInput.placeholder = 'Masukkan nama...';
                nameInput.value = testimony?.name || '';
                nameInputWrapper.appendChild(nameInput);
                nameGroup.appendChild(nameLabel);
                nameGroup.appendChild(nameInputWrapper);

                // Occupation Input
                const occupationGroup = document.createElement('div');
                occupationGroup.className = 'row mb-3';
                const occupationLabel = document.createElement('label');
                occupationLabel.innerText = 'Jabatan';
                occupationLabel.className = 'col-sm-2 col-form-label';
                const occupationInputWrapper = document.createElement('div');
                occupationInputWrapper.className = 'col-sm-6';
                const occupationInput = document.createElement('input');
                occupationInput.type = 'text';
                occupationInput.name = `testimonies[${testimonyIndex}][occupation]`;
                occupationInput.className = 'form-control';
                occupationInput.placeholder = 'Masukkan jabatan...';
                occupationInput.value = testimony?.occupation || '';
                occupationInputWrapper.appendChild(occupationInput);
                occupationGroup.appendChild(occupationLabel);
                occupationGroup.appendChild(occupationInputWrapper);

                // Year Input
                const yearGroup = document.createElement('div');
                yearGroup.className = 'row mb-3';
                const yearLabel = document.createElement('label');
                yearLabel.innerText = 'Tahun Angkatan';
                yearLabel.className = 'col-sm-2 col-form-label';
                const yearInputWrapper = document.createElement('div');
                yearInputWrapper.className = 'col-sm-6';
                const yearInput = document.createElement('select');
                yearInput.id = `testimonies[${testimonyIndex}][year]`;
                yearInput.name = `testimonies[${testimonyIndex}][year]`;
                yearInput.className = 'form-select';
                yearInputWrapper.appendChild(yearInput);
                yearGroup.appendChild(yearLabel);
                yearGroup.appendChild(yearInputWrapper);

                getYear(yearInput, testimony?.year);

                // Description textarea
                const descriptionGroup = document.createElement('div');
                descriptionGroup.className = 'row mb-3';
                const descriptionLabel = document.createElement('label');
                descriptionLabel.innerText = 'Testimoni';
                descriptionLabel.className = 'col-sm-2 col-form-label';
                const descriptionInputWrapper = document.createElement('div');
                descriptionInputWrapper.className = 'col-sm-6';
                const descriptionTextarea = document.createElement('textarea');
                descriptionTextarea.name = `testimonies[${testimonyIndex}][description]`;
                descriptionTextarea.className = 'form-control';
                descriptionTextarea.placeholder = 'Masukkan deskripsi...';
                descriptionTextarea.rows = 3;
                descriptionTextarea.value = testimony?.description || '';
                descriptionInputWrapper.appendChild(descriptionTextarea);
                descriptionGroup.appendChild(descriptionLabel);
                descriptionGroup.appendChild(descriptionInputWrapper);

                // Image Input
                const avatarGroup = document.createElement('div');
                avatarGroup.className = 'row mb-3';
                const avatarLabel = document.createElement('label');
                avatarLabel.innerText = 'Foto Narahubung';
                avatarLabel.className = 'col-sm-2 col-form-label';
                const avatarInputWrapper = document.createElement('div');
                avatarInputWrapper.className = 'col-sm-6';
                const avatarInput = document.createElement('input');
                avatarInput.type = 'file';
                avatarInput.name = `testimonies[${testimonyIndex}][avatar]`;
                avatarInput.className = 'filepond';
                avatarInput.accept = 'image/*';
                avatarInputWrapper.appendChild(avatarInput);
                avatarGroup.appendChild(avatarLabel);
                avatarGroup.appendChild(avatarInputWrapper);

                // Remove Button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-danger mt-2';
                removeBtn.innerHTML = 'Remove Testimony';
                removeBtn.addEventListener('click', () => {
                    if (testimoniesContainer.children.length > 1) {
                        testimonyWrapper.remove();
                    }
                });

                // Append elements to the testimony wrapper
                testimonyWrapper.appendChild(testimonyLabel);
                testimonyWrapper.appendChild(idInput);
                testimonyWrapper.appendChild(nameGroup);
                testimonyWrapper.appendChild(occupationGroup);
                testimonyWrapper.appendChild(yearGroup);
                testimonyWrapper.appendChild(descriptionGroup);
                testimonyWrapper.appendChild(avatarGroup);
                testimonyWrapper.appendChild(removeBtn);

                // Initialize FilePond for the image input
                const avatar_pond = initializeImagePond(avatarInput, false, 1);

                // Load existing image if available
                if (testimony?.image) {
                    let testimony_path = testimony.image.split('image/')[1];
                    avatar_pond.setOptions({
                        files: [{
                            source: testimony_path,
                            options: {
                                type: 'local',
                            }
                        }]
                    });
                }

                return testimonyWrapper;
            };

            const initializeDefaultFocus = (focusesContainer) => {
                const defaultFocusInput = createFocusInput(null, focusesContainer);
                focusesContainer.appendChild(defaultFocusInput);
            };

            const initializeDefaultActivity = (activitiesContainer) => {
                const defaultActivityInput = createActivityInput(null, activitiesContainer);
                activitiesContainer.appendChild(defaultActivityInput);
            };

            const initializeDefaultTestimony = (testimoniesContainer) => {
                const defaultTestimonyInput = createTestimonyInput(null, testimoniesContainer);
                testimoniesContainer.appendChild(defaultTestimonyInput);
            };

            const initializeProfileForm = async (committe) => {
                // Initialize CKEditor
                let long_description_editor = await InitializeCKEditor('#long_description');
                let mission_editor = await InitializeCKEditor('#mission');

                // Initialize Focus Container
                const focusesContainer = document.getElementById('focuses-container');
                const addFocusBtn = document.getElementById('add-focus-btn');

                // Add a new activities input on button click
                addFocusBtn.addEventListener('click', () => {
                    const newFocusInput = createFocusInput(null, focusesContainer);
                    focusesContainer.appendChild(newFocusInput);
                });

                // Initialize Activity Container
                const activitiesContainer = document.getElementById('activities-container');
                const addActivityBtn = document.getElementById('add-activity-btn');

                // Add a new Activity input on button click
                addActivityBtn.addEventListener('click', () => {
                    const newActivityInput = createActivityInput(null, activitiesContainer);
                    activitiesContainer.appendChild(newActivityInput);
                });

                // Initialize FilePond for the logo input
                const logo_input = document.querySelector('#logo');
                const logo_pond = initializeImagePond(logo_input)

                // Initialize FilePond for the logo input
                const background_input = document.querySelector('#background');
                const background_pond = initializeImagePond(background_input)

                // Initialize FilePond for the gallery input
                const gallery_input = document.querySelector('#gallery');
                const gallery_pond = initializeImagePond(gallery_input, true, 3)

                // Pre-fill the form fields if editing a committe
                document.getElementById('name').value = committe.name;
                document.getElementById('description').value = committe.description;

                // Set CKEditor Value
                if (committe.long_description) {
                    long_description_editor.setData(committe.long_description)
                }

                if (committe.mission_statement) {
                    mission_editor.setData(committe.mission_statement)
                }

                // Set logo_input
                if (committe?.logo) {
                    let logo = committe?.logo?.split('image/')[1];

                    // Add the existing file using the image URL
                    logo_pond.setOptions({
                        files: [{
                            source: logo,
                            options: {
                                type: 'local',
                            }
                        }, ]
                    })
                }

                // Set logo_input
                if (committe?.background) {
                    let background = committe?.background?.split('image/')[1];

                    // Add the existing file using the image URL
                    background_pond.setOptions({
                        files: [{
                            source: background,
                            options: {
                                type: 'local',
                            }
                        }, ]
                    })
                }

                // Pre-fill the gallery with existing images
                if (committe.galleries && committe.galleries.length > 0) {

                    const galleryFiles = committe.galleries.map(gallery => {

                        let image_path = gallery?.url?.split('image/')[1];
                        return {
                            source: image_path,
                            options: {
                                type: 'local'
                            }
                        };
                    });

                    gallery_pond.setOptions({
                        files: galleryFiles
                    });
                }

                // Pre-fill Focuses Input
                // Add focuss if available, otherwise add the default focus input
                if (committe.focuses.length > 0) {
                    committe.focuses.forEach((focus) => {
                        const focusInput = createFocusInput(focus, focusesContainer);
                        focusesContainer.appendChild(focusInput);
                    });
                } else {
                    initializeDefaultFocus(focusesContainer); // Add a default input if no focuss exist
                }

                // Pre-fill activities Input
                // Add activity if available, otherwise add the default focus input
                if (committe.activities.length > 0) {
                    committe.activities.forEach((activity) => {
                        const activityInput = createActivityInput(activity, activitiesContainer);
                        activitiesContainer.appendChild(activityInput);
                    });
                } else {
                    initializeDefaultActivity(activitiesContainer); // Add a default input if no activity exist
                }
            }

            const initializeTestimoniesForm = (testimonies) => {
                const testimoniesContainer = document.getElementById('testimonies-container');
                const addTestimonyBtn = document.getElementById('add-testimony');

                addTestimonyBtn.addEventListener('click', () => {
                    const newTestimony = createTestimonyInput(null, testimoniesContainer);
                    testimoniesContainer.appendChild(newTestimony);
                });

                // Pre-fill testimonies Input
                // Add testimony if available, otherwise add the default focus input
                if (testimonies.length > 0) {
                    testimonies.forEach((testimony) => {
                        const testimonyInput = createTestimonyInput(testimony, testimoniesContainer);
                        testimoniesContainer.appendChild(testimonyInput);
                    });
                } else {
                    initializeDefaultTestimony(testimoniesContainer); // Add a default input if no testimony exist
                }
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
                // Initialize Data
                let committe = @json($committe);
                let testimonies = committe.testimonies;
                let contact = committe.contact;

                initializeProfileForm(committe);
                initializeTestimoniesForm(testimonies)
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
