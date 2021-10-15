<li class="nav-item has-treeview {{ request()->is('admin/employees/add-employee') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/employees/list-employees')? 'menu-open':'' }}
                                 {{ request()->is('admin/employees/attendance')? 'menu-open':'' }}
                                 {{ request()->is('admin/employees/profile/*')? 'menu-open':'' }}
                                 {{ request()->is('admin/employees/edit/*')? 'menu-open':'' }}
    ">
    <a href="#" class="nav-link {{ request()->is('admin/employees/add-employee')? 'active':'' }}
                                {{ request()->is('admin/employees/list-employees')? 'active':'' }}
                                {{ request()->is('admin/employees/attendance')? 'active':'' }}
                                {{ request()->is('admin/employees/profile/*')? 'active':'' }}
                                {{ request()->is('admin/employees/edit/*')? 'active':'' }}
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
            <a
                href="{{ route('admin.employees.create') }}"
                class="nav-link {{ request()->is('admin/employees/add-employee')? 'active':'' }}"
            >
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Employee</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.employees.index') }}"
                class="nav-link {{ request()->is('admin/employees/list-employees')? 'active':'' }} 
                                {{ request()->is('admin/employees/profile/*')? 'active':'' }}
                                {{ request()->is('admin/employees/edit/*')? 'active':'' }}
                                ">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>List Employees</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.employees.attendance') }}"
                class="nav-link {{ request()->is('admin/employees/attendance')? 'active':'' }}"
            >
                <i class="fas fa-user-check nav-icon"></i>
                <p>Employee Attendance</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview {{ request()->is('admin/leaves/list-leaves') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/expenses/list-expenses') ? 'menu-open' : '' }}
    ">
    <a href="#" class="nav-link {{ request()->is('admin/leaves/list-leaves') ? 'active' : '' }}
                                {{ request()->is('admin/expenses/list-expenses') ? 'active' : '' }}
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
            <a
                href="{{ route('admin.leaves.index') }}"
                class="nav-link {{ request()->is('admin/leaves/list-leaves') ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Leaves</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.expenses.index') }}"
                class="nav-link {{ request()->is('admin/expenses/list-expenses') ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Expenses</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview {{ request()->is('admin/holidays/add-holiday') ? 'menu-open' : '' }}
                                 {{ request()->is('admin/holidays/list-holidays') ? 'menu-open' : '' }}
    ">
    <a href="#" class="nav-link  {{ request()->is('admin/holidays/add-holiday') ? 'active' : '' }}
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
            <a
                href="{{ route('admin.holidays.create') }}"
                class="nav-link  {{ request()->is('admin/holidays/add-holiday') ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Add Holiday</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.holidays.index') }}"
                class="nav-link {{ request()->is('admin/holidays/list-holidays') ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>List Holidays</p>
            </a>
        </li>
    </ul>
</li>