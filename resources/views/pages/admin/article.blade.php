<x-layout.master>
    @section('title', 'Manajemen Artikel')

    <h1 class="h3 mb-3"><strong>Manajemen Artikel</h1>

    <div class="row">
        <div class="col-24 col-lg-24 col-xxl-24 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 class="card-title mb-0">Daftar Artikel</h5>

                    {{-- Add Button --}}
                    @canany(['sudo', 'post.*', 'post.create'])
                        <a class="btn btn-primary d-flex align-items-center" href="{{ route('article.create') }}">
                            Tambah Artikel <i class="ms-2 align-middle" data-feather="plus"></i>
                        </a>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ route('article.index') }}" method="GET" class="input-group mb-3">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Cari judul, Penulis, Editor ..." aria-label="Search"
                                    value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit" data-bs-toggle="tooltip" title="Cari">
                                    <i class="align-middle" data-feather="search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div style="overflow-x: auto">
                        <table class="table table-hover table-bordered my-0">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Judul</th>
                                    <th class="bg-primary text-white d-none d-md-table-cell">Highlight</th>
                                    <th class="bg-primary text-white d-none d-md-table-cell">Penulis</th>
                                    <th class="bg-primary text-white d-none d-md-table-cell">Tanggal Publikasi</th>
                                    <th class="bg-primary text-white">Editor</th>
                                    <th class="bg-primary text-white">Tanggal Perubahan</th>
                                    <th class="bg-primary text-white d-none d-md-table-cell" style="width: 250px">Cover
                                    </th>
                                    <th class="bg-primary text-white">Status</th>
                                    <th class="bg-primary text-white" style="width: 150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($posts->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            <i data-feather="file-text" class="mb-2"
                                                style="width: 24px; height:24px"></i>
                                            <br>
                                            <span>Tidak ada artikel yang tersedia.</span>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="">{{ $post->title }}</td>
                                            <td class="d-none d-md-table-cell">{{ $post->highlight }}</td>
                                            <td class="d-none d-md-table-cell">{{ $post->author->full_name }}</td>
                                            <td class="d-none d-md-table-cell">
                                                {{ $timeStamp = date('d M Y H:i', strtotime($post->created_at)) }}
                                            </td>
                                            <td class="">{{ $post->editor->full_name }}</td>
                                            <td>
                                                {{ $timeStamp = date('d M Y', strtotime($post->updated_at)) }}
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                <img src="{{ $post->cover }}" class="img-thumbnail"
                                                    style="width: 300px" alt="{{ $post->slug }}">
                                            </td>

                                            <td>
                                                @if ($post->is_published)
                                                    <span class="badge bg-success p-2">Published</span>
                                                @else
                                                    <span class="badge bg-primary p-2">Scheduled</span>
                                                @endif
                                            </td>

                                            <td class="">
                                                <div class="d-flex justify-content-evenly">
                                                    {{-- Edit Button --}}
                                                    @canany(['sudo', 'post.*', 'post.update'])
                                                        <div data-bs-toggle="tooltip" title="Ubah artikel">
                                                            <a class="btn btn-warning text-dark"
                                                                href="{{ route('article.edit', ['article' => $post->slug]) }}">
                                                                <i class="align-middle" data-feather="edit"></i>
                                                            </a>
                                                        </div>
                                                    @endcanany

                                                    <!-- Delete Button -->
                                                    @canany(['sudo', 'post.*', 'post.delete'])
                                                        <div data-bs-toggle="tooltip" title="Hapus artikel">
                                                            <button type="button" class="btn btn-danger "
                                                                data-bs-toggle="modal" data-bs-target="#deleteFormModal"
                                                                data-action="{{ route('article.destroy', ['article' => $post->uuid]) }}">
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
                    </div>

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
