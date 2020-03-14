@extends('administration.layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">
            @include('administration.partial.title',['title'=>__('dashboard.Show Role'),'edit_link'=>'admin.role.edit','delete_link'=>'admin.role.destroy' , 'model_id'=>$role->id])
            @include('administration.partial.show_errors')
            <div class="row">
                <div class="col-12 card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class=" row">
                            <label class="col-sm-4 col-form-label">{{__('dashboard.Name')}} :</label>
                            <label
                                class="col-sm-8 col-form-label">{{$role->name}} </label>
                        </div>
                        <div class=" row">
                            <label class="col-sm-4 col-form-label">{{__('dashboard.Permissions')}} :</label>
                            <label class="col-sm-8 col-form-label">{{$role->permissions->pluck('name')}} </label>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop
