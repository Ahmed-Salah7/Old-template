@extends('administration.layouts.master')
@push('styles')
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    @include('administration.partial.title',['title'=>'Activity Log'])
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table id="vendor_table" class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Model Id</th>
                                    <th>Model Type</th>
                                    <th>Causer Name</th>
                                    <th>Causer Type</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#vendor_table').DataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{!!route('admin.activity.index.ajax')!!}",
                    columns: [
                        {data: 'action', name: 'action'},
                        {data: 'model_id', name: 'model_id'},
                        {data: 'model_type', name: 'model_type'},
                        {data: 'causer_name', name: 'causer_name'},
                        {data: 'causer_type', name: 'causer_type'},
                        {data: 'option', name: 'option'},
                    ]
                }
            );
        });
    </script>
@endpush
