<x-layout.master>
    @section('title', 'Manajemen Artikel')

    <h1 class="h3 mb-3"><strong>Manajemen Artikel</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Artikel</h5>

                    {{-- Add Button --}}
                    <a class="btn btn-primary d-flex align-items-center" href="{{ route('article.create') }}">
                        Tambah Artikel <i class="align-middle" data-feather="plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <form action="{{ route('article.index') }}" method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Cari judul, Penulis, Editor ..." aria-label="Search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip"
                                    title="Cari artikel"> <i class="align-middle" data-feather="search"></i></button>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover table-bordered my-0">
                        <thead>
                            <tr>
                                <th class="">Judul</th>
                                <th class="">Highlight</th>
                                <th class="">Penulis</th>
                                <th class="">Tanggal Publikasi</th>
                                <th class="">Editor</th>
                                <th class="">Tanggal Perubahan</th>
                                <th class="" style="width: 250px">Cover</th>
                                <th class="" style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="">{{ $post->title }}</td>
                                    <td class="">{{ $post->highlight }}</td>
                                    <td class="">{{ $post->author->full_name }}</td>
                                    <td>
                                        {{ $timeStamp = date('d M Y', strtotime($post->created_at)) }}
                                    </td>
                                    <td class="">{{ $post->editor->full_name }}</td>
                                    <td>
                                        {{ $timeStamp = date('d M Y', strtotime($post->updated_at)) }}
                                    </td>
                                    <td class="">
                                        <img src="{{ $post->cover }}" class="img-thumbnail" style="width: 300px"
                                            alt="{{ $post->slug }}">
                                    </td>
                                    <td class="">
                                        <div class="d-flex justify-content-evenly">
                                            {{-- Edit Button --}}
                                            <div data-bs-toggle="tooltip" title="Ubah artikel">
                                                <a class="btn btn-warning text-dark"
                                                    href="{{ route('article.edit', ['article' => $post->slug]) }}">
                                                    <i class="align-middle" data-feather="edit"></i>
                                                </a>
                                            </div>

                                            <!-- Delete Button -->
                                            <div data-bs-toggle="tooltip" title="Hapus artikel">
                                                <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                                    data-bs-target="#deleteFormModal"
                                                    data-action="{{ route('article.destroy', ['article' => $post->uuid]) }}">
                                                    <i class="align-middle" data-feather="trash"></i>
                                                </button>
                                            </div>
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

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteFormModal" tabindex="-1" aria-labelledby="deleteFormModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteFormModalLabel">Hapus article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            document.addEventListener('DOMContentLoaded', async function() {

                // Initialize Tooltip
                let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Initialize Modal
                let deleteFormModal = new bootstrap.Modal(document.getElementById('deleteFormModal'));

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
