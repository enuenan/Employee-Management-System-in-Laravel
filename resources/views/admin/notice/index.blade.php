@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Notice</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 col-md-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            List Notice
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
            @include('messages.alerts')
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-title text-center">
                                Notice
                                <a href="{{ route('admin.notice.create') }}" class="">
                                    <button><i class="fas fa-plus-square"></i></button>
                                </a>
                            </div>

                        </div>
                        <div class="card-body">
                            @if ($notices->count())
                                <table class="table table-bordered table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>PDF</th>
                                            <th class="none">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notices as $notice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $notice->name }}</td>
                                                <td>{!! $notice->description !!}</td>
                                                <td class="w-25">
                                                    @if ($notice->image)
                                                        <img src="{{ Storage::url($notice->image) }}" id="imagePreview"
                                                            class="avatar" alt="..." width="25%">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($notice->file)
                                                        <iframe src="{{ Storage::url($notice->file) }}" frameborder="0"
                                                            height="300px" width="100%"></iframe>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.notice.edit', $notice->id) }}"
                                                        class="btn btn-flat btn-primary">Edit</a>
                                                    <button class="btn btn-flat btn-danger" data-toggle="modal"
                                                        data-target="#deleteModalCenter{{ $loop->iteration }}">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @for ($i = 1; $i < $notices->count() + 1; $i++)
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModalCenter{{ $i }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalCenterTitle1{{ $i }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="card card-danger">
                                                    <div class="card-header">
                                                        <h5 style="text-align: center !important">Are you sure want to
                                                            delete?
                                                        </h5>
                                                    </div>
                                                    <div class="card-body text-center d-flex"
                                                        style="justify-content: center">

                                                        <button type="button" class="btn flat btn-secondary"
                                                            data-dismiss="modal">No</button>

                                                        <form
                                                            action="{{ route('admin.notice.destroy', $notices->get($i - 1)->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn flat btn-danger ml-1">Yes</button>
                                                        </form>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <small>This action is irreversable</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                @endfor
                            @else
                                <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                    <h4>No Records Available</h4>
                                </div>
                            @endif

                        </div>
                    </div>
                    <!-- general form elements -->

                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('extra-js')

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@endsection
