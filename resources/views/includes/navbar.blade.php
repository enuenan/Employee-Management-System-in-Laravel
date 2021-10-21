<style>
    .blink_me {
        animation: blinker 1.5s linear infinite;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

    </ul>

    @if (Auth::user()->employee)
        @if ($lateCount != 0)
            <ul class="navbar-nav mx-auto">
                <li class="nav-link h4 text-danger blink_me">
                    WARNING!!! You have been late for {{ $lateCount }} days in this month.
                </li>
            </ul>
        @endif
    @endif


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{ count($notifications) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{ count($notifications) }} Notifications</span>
                <div class="dropdown-divider"></div>
                @foreach ($notifications as $notification)
                    @if (Auth::user()->employee)
                        @if ($notification->type == 'App\Notifications\Notice')
                            <a href="{{ route('employee.markNotiAsRead', [$notification, 'type' => 'notice']) }}"
                                class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i>
                                You have a new notice.
                                <span class="float-right text-muted text-sm">
                                    {{ $notification->updated_at->diffForHumans() }}
                                </span>
                            </a>
                        @elseif ($notification->type == 'App\Notifications\EmployeeLeaveStatusNotification')
                            <a href="{{ route('employee.markNotiAsRead', [$notification, 'type' => 'EmployeeLeaveStatusNotification']) }}"
                                class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i>
                                {{ $notification->data['message'] }}
                                <span class="float-right text-muted text-sm">
                                    {{ $notification->updated_at->diffForHumans() }}
                                </span>
                            </a>

                        @endif
                    @else
                        @if ($notification->type == 'App\Notifications\AdminLeavesNotification')
                            <a href="{{ route('admin.markNotiAsRead', [$notification, 'type' => 'AdminLeavesNoti']) }}"
                                class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i>
                                You have a leave notification
                                <span class="float-right text-muted text-sm">
                                    {{ $notification->updated_at->diffForHumans() }}
                                </span>
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>
        </li>

        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @if (Auth::user()->employee)
                    <img src="{{ Storage::url(Auth::user()->employee->image) }}"
                        class="user-image img-circle elevation-2" alt="User Image">
                @else
                    {{-- <img src="/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image"> --}}

                    @if (Auth::user()->adminSetting->image)
                        <img src="{{ Storage::url(Auth::user()->adminSetting->image) }}"
                            class="user-image img-circle elevation-2" alt="User Image">
                    @else
                        <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    @endif
                @endif
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    @if (Auth::user()->employee)
                        <img src="{{ Storage::url(Auth::user()->employee->image) }}" class="img-circle elevation-2"
                            alt="User Image">
                    @else
                        @if (Auth::user()->adminSetting->image)
                            <img src="{{ Storage::url(Auth::user()->adminSetting->image) }}"
                                class="img-circle elevation-2" alt="User Image">
                        @else
                            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        @endif
                    @endif

                    <p>
                        {{ Auth::user()->name }}
                        @if (Auth::user()->employee)
                            - {{ Auth::user()->employee->desg }}, {{ Auth::user()->employee->department->name }}
                        @endif
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body text-center">
                    @if (Auth::user()->employee)
                        <small>Member since {{ Auth::user()->employee->join_date->format('d M, Y') }}</small>
                    @endif
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        @if (Auth::user()->employee)
                            <a href="{{ route('employee.profile') }}" class="btn btn-default btn-flat">Profile</a>
                        @else
                            <a href="{{ route('admin.reset-password') }}" class="btn btn-default btn-flat">
                                Change Password
                            </a>
                        @endif
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> --}}
    </ul>

</nav>
