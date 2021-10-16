@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Reset Password</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Reset Password
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
            <div class="col-md-3 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h5 class="text-center">Reset Pasword</h5>
                    </div>
                    @include('messages.alerts')
                    @if ( Auth::user()->employee )
                        <form action="{{ route('employee.update-password') }}" method="POST">
                    @else
                        <form action="{{ route('admin.update-password') }}" method="POST">
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="password" name="current_password" class="form-control" placeholder="Current Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error ('current_password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="New Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        @error ('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        @error ('password_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-flat btn-primary" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
    <!-- /.content -->

@endsection
@section('extra-js')

<script>
    
</script>
@endsection