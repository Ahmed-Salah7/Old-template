@extends('administration.layouts.master')
@push('styles')
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    @include('administration.partial.title',['title'=>__('dashboard.Activity Log')])
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
                                    <th>{{__('dashboard.Action')}}</th>
                                    <th>{{__('dashboard.Model ID')}}</th>
                                    <th>{{__('dashboard.Model Type')}}</th>
                                    <th>{{__('dashboard.Causer Name')}}</th>
                                    <th>{{__('dashboard.Causer Type')}}</th>
                                    <th>{{__('dashboard.Date')}}</th>
                                    <th>{{__('dashboard.Option')}}</th>
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
                        {data: 'created_at', name: 'created_at'},
                        {data: 'option', name: 'option'},
                    ]
                }
            );
        });
    </script>
@endpush
