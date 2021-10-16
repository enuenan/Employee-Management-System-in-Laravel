@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Admin Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Admin Dashboard
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
        {{-- <row class="">
            <div class="col-md-8 mx-auto">
                <div class="jumbotron">
                <h1 class="display-4 text-primary">Welcome to Admin Panel of EAMS</h1>
                <p class="lead">This is employee management application used for handling to the statistics, visualizations and other various tabular work</p>
                <hr class="my-4">
                <p>Hope you like it</p>
                </div>
            </div>
        </row> --}}

        <div class="row mb-5">
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.allAdmin') }}">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon bg-info">
                            <img src="{{ asset('img/engineering_black_24dp.svg') }}" alt="" class="w-full"
                                style="width: 50%">
                        </span>
    
                        <div class="info-box-content">
                            <span class="info-box-text">All Admin</span>
                            <span class="info-box-number">{{ $admins }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.employees.index') }}">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon bg-info">
                            <img src="{{ asset('img/engineering_black_24dp.svg') }}" alt="" class="w-full"
                                style="width: 50%">
                        </span>
    
                        <div class="info-box-content">
                            <span class="info-box-text">All Employees</span>
                            <span class="info-box-number">{{ $employees }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.employees.create') }}">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-success">
                            <img src="{{ asset('img/person_add_black_24dp.svg') }}" alt="" class="w-full"
                            style="width: 50%">
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Add Employee</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>

            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <a href="{{ route('admin.employees.attendance') }}">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-warning">
                            <img src="{{ asset('img/today_white_24dp.svg') }}" alt="" class="w-full"
                            style="width: 50%">
                        </span>
    
                        <div class="info-box-content">
                            <span class="info-box-text">See today's Attendance</span>
                            {{-- <span class="info-box-number">Regular</span> --}}
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>

            <!-- /.col -->
            {{-- <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box shadow-lg">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Shadows</span>
                        <span class="info-box-number">Large</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div> --}}

            <!-- /.col -->
        </div>

        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center">
                <img src="{{ asset('img/Personal-settings-amico.svg') }}" alt="" srcset="" width="25%" class="bg-image">
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->

@endsection
