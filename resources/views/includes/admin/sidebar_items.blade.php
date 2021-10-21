<li
    class="nav-item has-treeview {{ request()->is('admin/employees/add-employee') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/employees/list-employees') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/employees/attendance') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/employees/profile/*') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/employees/edit/*') ? 'menu-open' : '' }}
    ">
    <a href="#"
        class="nav-link {{ request()->is('admin/employees/add-employee') ? 'active' : '' }}
                                {{ request()->is('admin/employees/list-employees') ? 'active' : '' }}
                                {{ request()->is('admin/employees/attendance') ? 'active' : '' }}
                                {{ request()->is('admin/employees/profile/*') ? 'active' : '' }}
                                {{ request()->is('admin/employees/edit/*') ? 'active' : '' }}
        ">
        <i class="nav-icon fa fa-calendar-check-o"></i>
        <p>
            Employees
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">3</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item has-treeview">
            <a href="{{ route('admin.employees.create') }}"
                class="nav-link {{ request()->is('admin/employees/add-employee') ? 'active' : '' }}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Employee</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.employees.index') }}"
                class="nav-link {{ request()->is('admin/employees/list-employees') ? 'active' : '' }} 
                                {{ request()->is('admin/employees/profile/*') ? 'active' : '' }}
                                {{ request()->is('admin/employees/edit/*') ? 'active' : '' }}
                                ">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>List Employees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.employees.attendance') }}"
                class="nav-link {{ request()->is('admin/employees/attendance') ? 'active' : '' }}">
                <i class="fas fa-user-check nav-icon"></i>
                <p>Employee Attendance</p>
            </a>
        </li>
    </ul>
</li>

<li
    class="nav-item has-treeview {{ request()->is('admin/leaves/list-leaves') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/expenses/list-expenses') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/notice') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/notice/create') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/notice/*/edit') ? 'menu-open' : '' }}
    ">
    <a href="#"
        class="nav-link {{ request()->is('admin/leaves/list-leaves') ? 'active' : '' }}
                                {{ request()->is('admin/expenses/list-expenses') ? 'active' : '' }}
                                {{ request()->is('admin/notice') ? 'active' : '' }}
                                {{ request()->is('admin/notice/create') ? 'active' : '' }}
                                {{ request()->is('admin/notice/*/edit') ? 'active' : '' }}
        ">
        <i class="nav-icon fa fa-unlock-alt"></i>
        <p>
            Authorization
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">2</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.leaves.index') }}"
                class="nav-link {{ request()->is('admin/leaves/list-leaves') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Leaves</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.expenses.index') }}"
                class="nav-link {{ request()->is('admin/expenses/list-expenses') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Requisition</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.notice.index') }}"
                class="nav-link {{ request()->is('admin/notice') ? 'active' : '' }}
                                {{ request()->is('admin/notice/create') ? 'active' : '' }}
                                {{ request()->is('admin/notice/*/edit') ? 'active' : '' }}
                ">
                <i class="far fa-circle nav-icon"></i>
                <p>Notices</p>
            </a>
        </li>
    </ul>
</li>

<li
    class="nav-item has-treeview {{ request()->is('admin/holidays/add-holiday') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/holidays/list-holidays') ? 'menu-open' : '' }}
    ">
    <a href="#"
        class="nav-link  {{ request()->is('admin/holidays/add-holiday') ? 'active' : '' }}
        {{ request()->is('admin/holidays/list-holidays') ? 'active' : '' }}
        ">
        <i class="nav-icon fa fa-calendar-minus-o"></i>
        <p>
            Holidays
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">2</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.holidays.create') }}"
                class="nav-link  {{ request()->is('admin/holidays/add-holiday') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Holiday</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.holidays.index') }}"
                class="nav-link {{ request()->is('admin/holidays/list-holidays') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List Holidays</p>
            </a>
        </li>
    </ul>
</li>

<li
    class="nav-item has-treeview {{ request()->is('admin/add-admin') ? 'menu-open' : '' }}
                                {{ request()->is('admin/edit-profile/*') ? 'menu-open' : '' }}
                                {{ request()->is('admin/reset-password') ? 'menu-open' : '' }}
                                {{ request()->is('admin/department') ? 'menu-open' : '' }}
                                {{ request()->is('admin/department/create') ? 'menu-open' : '' }}
                                {{ request()->is('admin/department/*/edit') ? 'menu-open' : '' }}
                                {{ request()->is('admin/designation') ? 'menu-open' : '' }}
                                {{ request()->is('admin/designation/create') ? 'menu-open' : '' }}
                                {{ request()->is('admin/designation/*/edit') ? 'menu-open' : '' }}
    ">
    <a href="#"
        class="nav-link  {{ request()->is('admin/add-admin') ? 'active' : '' }}
        {{ request()->is('admin/edit-profile/*') ? 'active' : '' }}
        {{ request()->is('admin/reset-password') ? 'active' : '' }}
        {{ request()->is('admin/department') ? 'active' : '' }}
        {{ request()->is('admin/department/create') ? 'active' : '' }}
        {{ request()->is('admin/department/*/edit') ? 'active' : '' }}
        {{ request()->is('admin/designation') ? 'active' : '' }}
        {{ request()->is('admin/designation/create') ? 'active' : '' }}
        {{ request()->is('admin/designation/*/edit') ? 'active' : '' }}
        ">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
            Settings
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">2</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.admin.create') }}"
                class="nav-link  {{ request()->is('admin/add-admin') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Admin</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.department.index') }}"
                class="nav-link  {{ request()->is('admin/department') ? 'active' : '' }} 
                                                                            {{ request()->is('admin/department/create') ? 'active' : '' }}
                                                                            {{ request()->is('admin/department/*/edit') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Department</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.designation.index') }}"
                class="nav-link  {{ request()->is('admin/designation') ? 'active' : '' }}
                                                                            {{ request()->is('admin/designation/create') ? 'active' : '' }}
                                                                            {{ request()->is('admin/designation/*/edit') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Designation</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.edit_profile', auth()->user()->id) }}"
                class="nav-link  {{ request()->is('admin/edit-profile/*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Edit Profile</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.reset-password', auth()->user()->id) }}"
                class="nav-link  {{ request()->is('admin/reset-password') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password</p>
            </a>
        </li>
    </ul>
</li>
