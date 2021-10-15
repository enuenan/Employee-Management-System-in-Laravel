<li class="nav-item has-treeview has-treeview {{ request()->is('employee/attendance/register') ? 'menu-open' : '' }}
                                 {{ request()->is('employee/attendance/list-attendances')? 'menu-open':'' }}
            ">
    <a href="#" class="nav-link {{ request()->is('employee/attendance/register') ? 'active' : '' }}
                                {{ request()->is('employee/attendance/list-attendances')? 'active':'' }} 
                                ">
        <i class="nav-icon fa fa-calendar-check-o"></i>
        <p>
            Attendance
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">2</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{ route('employee.attendance.create') }}"
                class="nav-link {{ request()->is('employee/attendance/register') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Attendance for Today</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('employee.attendance.index') }}"
                class="nav-link {{ request()->is('employee/attendance/list-attendances')? 'active':'' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>List of Attendances</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->is('employee/leaves/apply') ? 'menu-open' : '' }}
                                 {{ request()->is('employee/leaves/list-leaves')? 'menu-open':'' }}
            ">
    <a href="#" class="nav-link {{ request()->is('employee/leaves/apply') ? 'active' : '' }}
                                {{ request()->is('employee/leaves/list-leaves')? 'active':'' }}
            ">
        <i class="nav-icon fa fa-calendar-minus-o"></i>
        <p>
            Leaves
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">2</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
            href="{{ route('employee.leaves.create') }}"
                class="nav-link {{ request()->is('employee/leaves/apply') ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Apply for a Leave</p>
            </a>
        </li>
        <li class="nav-item">
            <a
            href="{{ route('employee.leaves.index') }}"
                class="nav-link {{ request()->is('employee/leaves/list-leaves')? 'active':'' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>List of Leaves</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->is('employee/expenses/claim-expense') ? 'menu-open' : '' }}
                                 {{ request()->is('employee/expenses/list-expenses')? 'menu-open':'' }}
            ">
    <a href="#" class="nav-link {{ request()->is('employee/expenses/claim-expense') ? 'active' : '' }}
                                {{ request()->is('employee/expenses/list-expenses')? 'active':'' }}
            ">
        <i class="nav-icon fa fa-calendar-minus-o"></i>
        <p>
            Expenses
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">2</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
            href="{{ route('employee.expenses.create') }}"
                class="nav-link {{ request()->is('employee/expenses/claim-expense') ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Claim Expense</p>
            </a>
        </li>
        <li class="nav-item">
            <a
            href="{{ route('employee.expenses.index') }}"
                class="nav-link {{ request()->is('employee/expenses/list-expenses')? 'active':'' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>List of Expenses</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview {{ request()->is('employee/self/holidays') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->is('employee/self/holidays') ? 'active' : '' }}">
        <i class="nav-icon fa fa-address-card"></i>
        <p>
            Self
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">3</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{-- <li class="nav-item">
            <a
                href="{{ route('employee.self.salary_slip') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Generate Salary slip</p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a
                href="{{ route('employee.self.holidays') }}"
                class="nav-link {{ request()->is('employee/self/holidays') ? 'active' : '' }}"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Holiday List</p>
            </a>
        </li>
    </ul>
</li>