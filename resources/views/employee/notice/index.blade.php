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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('employee.index') }}">Employee Dashboard</a>
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
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <!-- general form elements -->
                    @include('messages.alerts')
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">List of leaves</h3>
                        </div>
                        <div class="card-body">
                            @if ($notices->count())
                                <p class="text-danger">CLick on notice name to see full description</p>
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Notice Name</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notices as $index => $notice)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <p data-toggle="modal" data-target="#notice{{ $notice->id }}"
                                                        title="Click to see full description">
                                                        {{ $notice->name }}
                                                    </p>
                                                    <div class="modal fade" id="notice{{ $notice->id }}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Notice Description</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>{{ $notice->name }}</h3>
                                                                    <p>{!! $notice->description !!}</p>
                                                                    @if ($notice->image)
                                                                        <img src="{{ Storage::url($notice->image) }}"
                                                                            id="imagePreview" class="avatar mt-4"
                                                                            alt="..." width="25%">
                                                                    @endif
                                                                    @if ($notice->file)
                                                                        <iframe src="{{ Storage::url($notice->file) }}"
                                                                            class="mt-4" frameborder="0"
                                                                            height="600px" width="100%"></iframe>
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                </td>
                                                <td>{!! $notice->description !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                    <h4>No records available</h4>
                                </div>
                            @endif
                        </div>
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
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
            $('.popover-dismiss').popover({
                trigger: 'focus'
            });
            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false,
                columnDefs: [{
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    },
                    {
                        responsivePriority: 200000000000,
                        targets: -1
                    }
                ]
            });
            $('[data-toggle="tooltip"]').tooltip({
                trigger: 'hover'
            });
        });
    </script>
@endsection
