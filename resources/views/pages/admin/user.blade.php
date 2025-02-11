<x-layout.master>
    @section('title', 'Manajemen User')

    <h1 class="h3 mb-3"><strong>Manajemen User</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill" style="overflow-x: auto;">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar User</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'user.*', 'user.create'])
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-mode="create">
                            Tambah User <i class="align-middle" data-feather="plus"></i>
                        </button>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <form action="{{ route('user.index') }}" method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Cari username, nama, email ..." aria-label="Search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip" title="Cari">
                                    <i class="align-middle" data-feather="search"></i></button>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Username</th>
                                <th class="bg-primary text-white">Nama Lengkap</th>
                                <th class="bg-primary text-white">Email</th>
                                <th class="bg-primary text-white">Nomor HP</th>
                                <th class="bg-primary text-white">Password</th>
                                <th class="bg-primary text-white">Role</th>
                                <th class="bg-primary text-white">Dibuat</th>
                                <th class="bg-primary text-white" style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i data-feather="user" class="mb-2" style="width: 24px; height:24px"></i>
                                        <br>
                                        <span>Tidak ada user yang tersedia.</span>
                                    </td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td class="">{{ $user->full_name }}</td>
                                        <td class="">{{ $user->email }}</td>
                                        <td class="">{{ $user->phone }}</td>
                                        <td class="">{{ $user->visible_password }}</td>
                                        <td><span class="badge bg-primary p-2">{{ $user->role->display_name }}</span>
                                        </td>
                                        <td>
                                            {{ $timeStamp = date('d M Y', strtotime($user->created_at)) }}
                                        </td>
                                        <td class="">
                                            <div class="d-flex justify-content-evenly">
                                                {{-- Edit Button --}}
                                                @canany(['sudo', 'user.*', 'user.edit'])
                                                    <div data-bs-toggle="tooltip" title="Ubah user">
                                                        <button type="button"
                                                            class="btn btn-warning text-dark {{ $user->role->name === 'super-administrator' ? 'disabled' : '' }}"
                                                            data-bs-toggle="modal" data-bs-target="#userModal"
                                                            data-mode="edit"
                                                            data-action="{{ route('user.update', ['user' => $user->uuid]) }}"
                                                            data-user="{{ json_encode($user) }}">
                                                            <i class="align-middle" data-feather="edit"></i>
                                                        </button>
                                                    </div>
                                                @endcanany

                                                <!-- Delete Button -->
                                                @canany(['sudo', 'user.*', 'user.delete'])
                                                    <div data-bs-toggle="tooltip" title='Hapus User'>
                                                        <button type="button"
                                                            class="btn btn-danger {{ $user->role->name === 'super-administrator' ? 'disabled' : '' }} "
                                                            data-bs-toggle="modal" data-bs-target="#deleteUserModal"
                                                            data-action="{{ route('user.destroy', ['user' => $user->uuid]) }}">
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
                        {{ $users->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>

        <!-- User Add/Edit Form Modal -->
        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add User Form -->
                        <form id="userForm" action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" id="method" value="POST">

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username') }}" required>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                    id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                @error('full_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="" disabled selected>Please select a role
                                    </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->display_name }}</option>
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
        <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel">Hapus User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus user ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <form id="deleteUserForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')

        {{-- Modal --}}
        <script>
            const fillForm = (user) => {
                // Pre-fill the form fields if editing a user
                document.getElementById('username').value = user.username;
                document.getElementById('full_name').value = user.full_name;
                document.getElementById('email').value = user.email;
                document.getElementById('phone').value = user.phone;
                document.getElementById('role').value = user.role.name;

                // Set the role in the select dropdown
                const roleSelect = document.getElementById('role');
                roleSelect.value = user.role.name;
            }

            const resetForm = () => {
                // Pre-fill the form fields if editing a user
                document.getElementById('username').value = '';
                document.getElementById('full_name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('phone').value = '';
                document.getElementById('role').value = '';
            }

            document.addEventListener('DOMContentLoaded', function() {

                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
                    tooltipTriggerEl))

                // Initiate Modal
                let userModal = new bootstrap.Modal(document.getElementById('userModal'));
                let deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));

                // Handle the modal trigger for add and edit action
                let mode = 'create';

                document.querySelectorAll('[data-bs-target="#userModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        // clear form If mode was edit
                        if (mode === 'edit') resetForm();

                        let actionUrl = button.getAttribute('data-action');
                        let user = JSON.parse(button.getAttribute('data-user'));
                        mode = button.getAttribute('data-mode');

                        // Update modal title and action URL for editing
                        if (mode === 'edit') {
                            resetValidation();

                            document.getElementById('userModalLabel').textContent = 'Ubah User';
                            document.getElementById('userForm').setAttribute('action', actionUrl);
                            document.getElementById('submitButton').textContent = 'Ubah';
                            document.getElementById('method').value = 'PUT';

                            fillForm(user);
                        } else {
                            // Set to Add User if no action URL is provided
                            document.getElementById('userModalLabel').textContent = 'Tambah User';
                            document.getElementById('userForm').setAttribute('action',
                                '{{ route('user.store') }}');
                            document.getElementById('submitButton').textContent = 'Simpan';
                            document.getElementById('method').value = 'POST';

                            // resetForm();
                        }

                    });
                });

                // Handle the modal trigger for delete action
                document.querySelectorAll('[data-bs-target="#deleteUserModal"]').forEach(function(button) {
                    button.addEventListener('click', function() {
                        let actionUrl = button.getAttribute('data-action');
                        document.getElementById('deleteUserForm').setAttribute('action', actionUrl);
                    });
                });
            });
        </script>

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
                            let userModal = new bootstrap.Modal(document.getElementById('userModal'));

                            userModal.show();
                        }
                    });;


                });
            </script>
        @endif
    @endsection
</x-layout.master>
