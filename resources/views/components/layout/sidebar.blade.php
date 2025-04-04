<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <span class="align-middle">CIMSA ULM</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main Menu
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="sidebar-link " href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @canany(['sudo', 'profile-management'])
                <li class="sidebar-item {{ request()->routeIs(['cimsa-profile.index']) ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('cimsa-profile.index') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile CIMSA</span>
                    </a>
                </li>
            @endcanany

            @canany(['sudo', 'page-management'])
                <li class="sidebar-item {{ request()->routeIs(['page.index', 'page.edit']) ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('page.index') }}">
                        <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Manajemen
                            Halaman</span>
                    </a>
                </li>
            @endcanany

            @canany(['sudo', 'official-management'])
                <li
                    class="sidebar-item {{ request()->routeIs(['official.index', 'official.division.index', 'official.division.member.index']) ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('official.index') }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen
                            Angkatan</span>
                    </a>
                </li>
            @endcanany

            @canany(['sudo', 'committe-management'])
                <li class="sidebar-item {{ request()->routeIs(['committe.index', 'committe.edit']) ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('committe.index') }}">
                        <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Manajemen
                            Komite</span>
                    </a>
                </li>
            @endcanany

            @canany(['sudo', 'training-management'])
                <li class="sidebar-item {{ request()->routeIs('training.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('training.index') }}">
                        <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Manajemen
                            Pelatihan</span>
                    </a>
                </li>
            @endcanany

            {{-- Article Management Menu --}}
            @canany(['sudo', 'post-management', 'category-management'])
                <li class="sidebar-header">
                    Manajemen Artikel
                </li>

                @canany(['sudo', 'post-management'])
                    <li
                        class="sidebar-item {{ request()->routeIs(['article.index', 'article.create', 'article.edit']) ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('article.index') }}">
                            <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Artikel</span>
                        </a>
                    </li>
                @endcanany

                @canany(['sudo', 'category-management'])
                    <li class="sidebar-item {{ request()->routeIs('category.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('category.index') }}">
                            <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Kategori
                                Artikel</span>
                        </a>
                    </li>
                @endcanany
            @endcanany

            {{-- Users Management Menu --}}
            @canany(['sudo', 'user-management', 'role-management'])
                <li class="sidebar-header">
                    Manajemen Pengguna
                </li>

                @canany(['sudo', 'user-management'])
                    <li class="sidebar-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('user.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                        </a>
                    </li>
                @endcanany

                @canany(['sudo', 'role-management'])
                    <li class="sidebar-item {{ request()->routeIs('role.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('role.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Roles</span>
                        </a>
                    </li>
                @endcanany

                {{-- @canany(['sudo', 'permission-management'], $post)
                    <li class="sidebar-item {{ request()->routeIs('permission.index') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('permission.index') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Permissions</span>
                        </a>
                    </li>
                @endcanany --}}
            @endcanany
        </ul>
    </div>
</nav>
