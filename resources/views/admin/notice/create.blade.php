@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add notice</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Add notice
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
                            <h5 class="text-center mt-2">Add new notice</h5>
                        </div>
                        @include('messages.alerts')
                        <form action="{{ route('admin.notice.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card-body">

                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Notice Name</label>
                                                <input type="text" name="notice_name" value="{{ old('notice_name') }}"
                                                    class="form-control" required>
                                                @error('notice_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Notice Details</label>
                                                <textarea name="notice_description" id="summernote"
                                                    required>{{ old('notice_description') }}</textarea>
                                                @error('notice_description')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Choose a image file</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="imageFile"
                                                            onchange="previewFile(this);" name="image">
                                                        <label class="custom-file-label" for="imageFile">
                                                            Choose image
                                                        </label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                                <img src="http://placehold.it/100x50" id="imagePreview"
                                                    class="avatar" alt="..." width="50%">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Choose a pdf file</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                                            name="pdf">
                                                        <label class="custom-file-label" for="exampleInputFile">
                                                            Choose file
                                                        </label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>


                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-info"
                                    style="width: 40%; font-size:1.3rem">Add</button>
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
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        });

        imageFile.onchange = evt => {
            console.log("Enan");
            const [file] = imageFile.files
            if (file) {
                imagePreview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
