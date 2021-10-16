@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Dashboard
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
        <div class="row mb-5">
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('employee.attendance.create') }}">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon bg-info">
                            <img src="{{ asset('img/engineering_black_24dp.svg') }}" alt="" class="w-full"
                                style="width: 50%">
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Attendance for today</span>
                            {{-- <span class="info-box-number">{{ $employees }}</span> --}}
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center">
                <img src="{{ asset('img/Company-amico.svg') }}" alt="" srcset="" width="30%" class="bg-image">
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection
