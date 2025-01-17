@extends('layouts.app')

@section('content')
<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                $("#imagePreview").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

</script>

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
                        <a href="#">Home</a>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card card-info">
                    <div class="card-header">
                        <h5 class="text-center mt-2">My Profile</h5>
                    </div>
                    <form action="{{ route('employee.profile-update', $employee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <fieldset>
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" value="{{ $employee->first_name }}"
                                        class="form-control">
                                    @error('first_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $employee->last_name }}"
                                        class="form-control">
                                    @error('last_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="text" name="dob" id="dob" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" class="form-control" readonly>
                                        <option value="Male" selected>Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="join_date">Join Date</label>
                                    <input type="text" name="join_date" id="join_date" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Designation</label>
                                        <select name="desg" class="form-control">
                                            @foreach ($desgs as $desg)
                                            <option value="{{ $desg->name }}" @if ($desg->name==$employee->desg)
                                                selected
                                                @endif
                                                >
                                                {{ $desg->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Department</label>
                                        <select name="department_id" class="form-control">
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" @if ($department->id ==
                                                $employee->department_id)
                                                selected
                                                @endif
                                                >
                                                {{ $department->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Photo</label>
                                    <input type="file" name="image" class="form-control-file"
                                        onchange="previewFile(this);">
                                    @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ Storage::url($employee->image) }}" id="imagePreview" class="avatar"
                                        alt="..." width="50%">
                                </div>

                            </fieldset>


                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-flat btn-primary"
                                style="width: 40%; font-size:1.3rem">Save</button>
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

@section('extra-js')
<script>
    $().ready(function () {
        dob = new Date('{{ $employee->dob }}');
        joinDate = new Date('{{ $employee->join_date }}');
        $('#dob').daterangepicker({
            "singleDatePicker": true,
            "startDate": dob,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
        $('#join_date').daterangepicker({
            "singleDatePicker": true,
            "startDate": joinDate,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
    });

</script>
@endsection
