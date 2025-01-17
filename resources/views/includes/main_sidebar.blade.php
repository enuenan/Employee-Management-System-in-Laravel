<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-lightblue"
    style="z-index: 1040 !important; background-color: #13293D !important;">
    <!-- Brand Logo -->
    <a @can('admin-access') href="{{ route('admin.index') }}" @endcan @can('employee-access')
    href="{{ route('employee.index') }}" @endcan class="brand-link text-center navbar-lightblue">
    {{-- <img src="/img/Dynamicflow-Final-Logo-01-01.png" alt="AdminLTE Logo" class="brand-image img-circle"
        style="opacity: 0.8;" /> --}}
    <span class="brand-text font-weight-light ">Dynamicflow</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::user()->employee)
                <img src="{{ Storage::url(Auth::user()->employee->image) }}" class="img-circle elevation-2"
                    alt="User Image" />
            @else
                {{-- <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" /> --}}

                @if (Auth::user()->adminSetting->image)
                    <img src="{{ Storage::url(Auth::user()->adminSetting->image) }}" class="img-circle elevation-2"
                        alt="User Image">
                @else
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                @endif
            @endif

        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
            data-accordion="false">
            @can('admin-access')

                <li class="nav-item">
                    <a href="{{ route('admin.index') }}"
                        class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="fas fa-dna nav-icon"></i>
                        <p>Admin Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.allAdmin') }}"
                        class="nav-link {{ request()->is('admin/all-admin') ? 'active' : '' }}">
                        <i class="fas fa-dna nav-icon"></i>
                        <p>All Admin</p>
                    </a>
                </li>
                @include('includes.admin.sidebar_items')
            @endcan
            @can('employee-access')
                <li class="nav-item">
                    <a href="{{ route('employee.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Employee Dashboard

                        </p>
                    </a>
                </li>
                @include('includes.employee.sidebar_items')
            @endcan
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
