@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Department</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit Department
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
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-8 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Edit Department</h5>
                    </div>
                    @include('messages.alerts')
                    <form action="{{ route('admin.department.update', $department->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Department Name</label>
                                            <input type="text" name="dept_name" value="{{ old('dept_name') ? old('dept_name') : $department->name }}"
                                                class="form-control" required>
                                            @error('dept_name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" style="width: 40%; font-size:1.3rem">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection