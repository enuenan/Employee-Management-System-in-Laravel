@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Admins</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        All Admins
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">List of All admins</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Admin name</th>
                                    <th>Image</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td style="width: 30%">
                                        <img src="{{ Storage::url($admin->image) }}"
                                            class="user-img img-circle elevation-2" alt="User Image" width="30%">
                                    </td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->contact }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    $(document).ready(function () {
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
