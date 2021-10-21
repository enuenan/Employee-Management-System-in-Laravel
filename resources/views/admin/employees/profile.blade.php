@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Profile
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-info">
                    <div class="card-header">
                        <h5 class="text-center mt-2">My Profile</h5>
                    </div>
                    <div class="card-body">
                        @include('messages.alerts')
                        <div class="row mb-3">
                            <div class="col text-center mx-auto">
                                <img src="{{ Storage::url($employee->image) }}" class="rounded-circle img-fluid w-50"
                                    alt="" style="box-shadow: 2px 4px rgba(0,0,0,0.1)">
                            </div>
                        </div>
                        <table class="table profile-table table-hover">
                            <tr>
                                <td>First Name</td>
                                <td>{{ $employee->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $employee->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $employee->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ $employee->dob->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $employee->sex }}</td>
                            </tr>

                            <tr>
                                <td>Join Date</td>
                                <td>{{ $employee->join_date->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>{{ $employee->desg }}</td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>{{ $employee->department->name }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center" style="height: 2rem">

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="text-center mt-2">Year {{ Carbon\Carbon::parse(now())->format('Y') }}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 1]) }}">
                                <li
                                    class="list-group-item {{ ($month == 1) ? 'bg-secondary':''  }}">
                                    January</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 2]) }}">
                                <li
                                    class="list-group-item {{ ($month == 2) ? 'bg-secondary':''  }}">
                                    February</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 3]) }}">
                                <li
                                    class="list-group-item {{ ($month == 3) ? 'bg-secondary':''  }}">
                                    March</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 4]) }}">
                                <li
                                    class="list-group-item {{ ($month == 4) ? 'bg-secondary':''  }}">
                                    April</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 5]) }}">
                                <li
                                    class="list-group-item {{ ($month == 5) ? 'bg-secondary':''  }}">
                                    May</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 6]) }}">
                                <li
                                    class="list-group-item {{ ($month == 6) ? 'bg-secondary':''  }}">
                                    June</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 7]) }}">
                                <li
                                    class="list-group-item {{ ($month == 7) ? 'bg-secondary':''  }}">
                                    July</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 8]) }}">
                                <li
                                    class="list-group-item {{ ($month == 8) ? 'bg-secondary':''  }}">
                                    August</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 9]) }}">
                                <li
                                    class="list-group-item {{ ($month == 9) ? 'bg-secondary':''  }}">
                                    September</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 10]) }}">
                                <li
                                    class="list-group-item {{ ($month == 10) ? 'bg-secondary':''  }}">
                                    October</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 11]) }}">
                                <li
                                    class="list-group-item {{ ($month == 11) ? 'bg-secondary':''  }}">
                                    November</li>
                            </a>
                            <a href="{{ route('admin.employees.getAttendanceByMonth',[$employee->id, 12]) }}">
                                <li
                                    class="list-group-item {{ ($month == 12) ? 'bg-secondary':''  }}">
                                    December</li>
                            </a>
                        </ul>
                    </div>
                    <div class="card-footer text-center" style="height: 2rem">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h5 class="text-center mt-2">
                            Month <strong>{{ Carbon\Carbon::create()->startOfMonth()->month($month)->startOfMonth()->format('F') }}</strong>
                        </h5>
                        <h6 class="text-center mt-2">Total working days of this month : {{ $totalWorkingDays }}</h6>
                        <h6 class="text-center mt-2">Present : {{ count($thisMonthAttendances) }}</h6>
                    </div>
                    <div class="card-body">
                        <table class="table profile-table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Entry</th>
                                    <th class="none">Entry Record</th>
                                    <th>Exit</th>
                                    <th class="none">Exit Record</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            @foreach ($thisMonthAttendances as $thisMonthAttendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $thisMonthAttendance->created_at->format('d-M-Y h:i:s a') }}</td>
                                <td>{{ $thisMonthAttendance->entry_location}}</td>
                                <td>{{ $thisMonthAttendance->updated_at->format('d-m-Y h:i:s a') }}</td>
                                <td>{{ $thisMonthAttendance->exit_location }}</td>
                                <td>
                                    @php
                                    $checkInTime = strtotime('08:30:00');
                                    $loginTime = strtotime(date("H:i:s", strtotime($thisMonthAttendance->created_at)));
                                    $diff = $checkInTime - $loginTime;
                                    @endphp
                                    @if ($diff<0) 
                                        <p class="text-danger">Late 
                                            {{-- for {{ date("H:i:s", abs($diff)) }} --}}
                                        </p>
                                    @else
                                        <p>In Time</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer text-center" style="height: 2rem">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection
