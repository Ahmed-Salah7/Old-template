@extends('administration.layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">

            @include('administration.partial.title',['title'=>__('dashboard.Create User Account')])
            @include('administration.partial.show_errors')
            @include('administration.partial.show_success')

            <div class="row">
                <div class="col-12 card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form role="form" action="{{route("admin.user.store")}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> {{__('dashboard.Name')}}</label>
                                <input type="text" value="{{old('name')}}" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">{{__('dashboard.Email')}}</label>
                                <input type="text" value="{{old('email')}}" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">{{__('dashboard.Password')}}</label>
                                <input type="password" value="{{old('password')}}" name="password" class="form-control">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{__('dashboard.submit')}}</button>
                            </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop
