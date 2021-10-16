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
                <h1 class="m-0 text-dark">Edit {{ $user->name }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit profile
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
                        <h5 class="text-center mt-2">Edit Profile</h5>
                    </div>
                    @include('messages.alerts')
                    <form action="{{ route('admin.update_profile', auth()->user()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">

                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="name"
                                                value="{{ old('name') ? old('name'):$user->name }}"
                                                class="form-control" required>
                                            @error('name')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email"
                                                value="{{ old('email') ? old('email'):$user->email }}"
                                                class="form-control" required>
                                            @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Contact</label>
                                            <input type="tel" name="contact"
                                                value="{{ old('contact') ? old('contact'):$user->contact }}"
                                                class="form-control" required>
                                            @error('contact')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="image" class="form-control-file"
                                                onchange="previewFile(this);">
                                            @error('image')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ Storage::url(Auth::user()->adminSetting->image) }}" id="imagePreview" class="avatar" alt="..."
                                            width="50%">
                                    </div>
                                </div>
                            </fieldset>


                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" style="width: 40%; font-size:1.3rem">Update</button>
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
{{-- <script>
    $().ready(function () {
        if ('{{ old('
            dob ') }}') {
            const dob = moment('{{ old('
                dob ') }}', 'DD-MM-YYYY');
            const join_date = moment('{{ old('
                join_date ') }}', 'DD-MM-YYYY');
            console.log('{{ old('
                dob ') }}')
            $('#dob').daterangepicker({
                "startDate": dob,
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
            $('#join_date').daterangepicker({
                "startDate": join_date,
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
        } else {
            $('#dob').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
            $('#join_date').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
        }

    });

</script> --}}
@endsection
