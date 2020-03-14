@extends('administration.layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">

            @include('administration.partial.title',['title'=>__('dashboard.Update User Account'),'delete_link'=>'admin.user.destroy','model_id'=>$user->id])
            @include('administration.partial.show_errors')
            @include('administration.partial.show_success')

            <div class="row">
                <div class="col-12 card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route("admin.user.update",$user->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$user->id}}" name="id">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> {{__('dashboard.Name')}}</label>
                                <input type="text" value="{{$user->name}}" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">{{__('dashboard.Email')}}</label>
                                <input type="text" value="{{$user->email}}" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">{{__('dashboard.Password')}}</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{__('dashboard.submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop
