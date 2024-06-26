<aside class="main-sidebar sidebar-dark-primary elevation-4 d-flex flex-column">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('src/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar flex-grow-1">
        <!-- Sidebar user panel (optional) -->
        @if ($session)
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('src/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <p class="d-block text-white mb-0">{{ $session->name }}</p>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($menuItems as $menuItem)
                    <li class="nav-item">
                        <a href="{{ $menuItem['url'] }}"
                            class="nav-link {{ $isActive($menuItem['routeName']) ? 'active' : '' }}">

                            <p>{{ $menuItem['label'] }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <!-- Logout Button -->
    <div class="logout-button">
        @if ($session)
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger btn-block mt-auto">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-block mt-auto">Login</a>
        @endif
    </div>
</aside>
