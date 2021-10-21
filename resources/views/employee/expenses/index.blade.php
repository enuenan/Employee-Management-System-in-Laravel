@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List Requisition</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('employee.index') }}">Employee Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            List Requisition
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
                <div class="col-md-8 mx-auto">
                    <!-- general form elements -->
                    @include('messages.alerts')
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">List of Requisition</h3>
                        </div>
                        <div class="card-body">
                            @if ($expenses->count())
                                <table class="table table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Applied on</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                            <th>Description</th>
                                            <th class="none">Image</th>
                                            <th class="none">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expenses as $index => $expense)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $expense->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $expense->reason }}</td>
                                                <td>
                                                    <h5>
                                                        <span class="badge badge-pill badge-@if ($expense->status == 'pending')warning @elseif($expense->status == 'declined')danger @elseif($expense->status == 'approved')success @endif">
                                                            {{ ucfirst($expense->status) }}
                                                        </span>
                                                    </h5>
                                                </td>
                                                <td>{{ $expense->description }}</td>
                                                <td>
                                                    @if ($expense->file)
                                                        <button type="button" class="btn btn-flat btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#exampleModalCenter{{ $index + 1 }}">
                                                            View Image
                                                        </button>
                                                    @else
                                                        No image uploaded
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('employee.expenses.edit', $expense->id) }}"
                                                        class="btn btn-flat btn-warning">Edit</a>
                                                    <button type="button" class="btn btn-flat btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#deleteModalCenter{{ $index + 1 }}">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @for ($i = 1; $i < $expenses->count() + 1; $i++)
                                    @if ($expenses->get($i - 1)->file)
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter{{ $i }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle1{{ $i }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                        <img src="{{ Storage::url($expenses->get($i - 1)->file) }}"
                                                            class="img-fluid" alt="Receipt Image"
                                                            style="width: auto; height:100%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal -->
                                    @endif
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
                                                            action="{{ route('employee.expenses.delete', $expenses->get($i - 1)->id) }}"
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

            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false
            });

        });
    </script>
@endsection
