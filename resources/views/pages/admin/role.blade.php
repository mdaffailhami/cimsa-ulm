<x-layout.master>
    @section('title', 'Manajemen Role')

    <h1 class="h3 mb-3"><strong>Manajemen Role</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Role</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'role.*', 'role.create'])
                        <button class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#formModal" data-mode="create">
                            Tambah Role<i class="ms-2 align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <form action="{{ route('role.index') }}" method="GET" class="input-group mb-3">
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
                                <th class="bg-primary text-white" style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($roles->isEmpty())
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-4">
                                        <i data-feather="user" class="mb-2" style="width: 24px; height:24px"></i>
                                        <br>
                                        <span>Tidak ada role yang tersedia.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="">{{ $role->name }}</td>
                                        <td class="">
                                            <div class="d-flex justify-content-evenly">
                                                {{-- Edit Button --}}
                                                @canany(['sudo', 'role.*', 'role.update'])
                                                    <div data-bs-toggle="tooltip" title='Ubah role'>
                                                        <button type="button"
                                                            class="btn btn-warning text-dark {{ $role->name === 'super-administrator' ? 'disabled' : '' }}"
                                                            data-bs-toggle="modal" data-bs-target="#formModal"
                                                            data-mode="edit"
                                                            data-action="{{ route('role.update', ['role' => $role->id]) }}"
                                                            data-role="{{ json_encode($role) }}">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </button>
                                                    </div>
                                                @endcanany

                                                <!-- Delete Button -->
                                                @canany(['sudo', 'role.*', 'role.delete'])
                                                    <div data-bs-toggle="tooltip" title='Hapus role'>
                                                        <button type="button"
                                                            class="btn btn-danger {{ $role->name === 'super-administrator' ? 'disabled' : '' }} "
                                                            data-bs-toggle="modal" data-bs-target="#deleteFormModal"
                                                            data-action="{{ route('role.destroy', ['role' => $role->id]) }}">
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
                        {{ $roles->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- role Add/Edit Form Modal -->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Tambah Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add role Form -->
                        <form id="roleForm" action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Role</label>
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
                                <label for="permissions" class="form-label">Hak Akses</label>
                                <select id="permissions" name="permissions[]" class="form-control" multiple>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
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
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus role ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deleteroleForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')

        <script>
            const fillForm = (role) => {
                // Pre-fill the form fields if editing a role
                document.getElementById('name').value = role.name;
            }

            const resetForm = () => {
                // Pre-fill the form fields if editing a role
                document.getElementById('name').value = '';
            }

            const getOptions = () => {
                const permissions = @json($permissions);

                return permissions.map((permission) => {
                    return {
                        value: permission.name,
                        label: permission.name,
                    }
                })
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Modal
                let formModal = new bootstrap.Modal(document.getElementById('formModal'));
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

                // Initialize Choice
                choices = new Choices('#permissions', {
                    removeItemButton: true,
                    placeholderValue: 'Pilih Hak Akses',
                    searchPlaceholderValue: 'Cari Hak Akses'
                });

                // Handle the modal trigger for add and edit action
                let mode = 'create';
                document.querySelectorAll('[data-bs-target="#formModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        // Reset form if mode was edit
                        if (mode === 'edit') resetForm();

                        let actionUrl = button.getAttribute('data-action');
                        let role = JSON.parse(button.getAttribute('data-role'));
                        mode = button.getAttribute('data-mode');
                        let options = getOptions();

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            resetValidation();

                            document.getElementById('formModalLabel').textContent = 'Ubah Role';
                            document.getElementById('roleForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(role);

                            // Get the permissions of the role
                            const role_permissions = role.permissions.map(permission => permission
                                .name);

                            choices.clearStore(); // Clear internal Choices.js data
                            choices.setValue(role_permissions); // Clear selected values
                        } else {
                            // Set to Add role if no action URL is provided
                            document.getElementById('formModalLabel').textContent = 'Tambah role';
                            document.getElementById('roleForm').setAttribute('action',
                                '{{ route('role.store') }}');
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
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deleteroleForm').setAttribute('action', actionUrl);
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
