@extends('administration.layouts.master')
@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">

            @include('administration.partial.title',['title'=>__('dashboard.Update Administration Account'),'delete_link'=>'admin.administration.destroy','model_id'=>$administration->id])
            @include('administration.partial.show_errors')
            @include('administration.partial.show_success')

            <div class="row">
                <div class="col-12 card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route("admin.administration.update",$administration->id)}}"
                          method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$administration->id}}" name="id">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"> {{__('dashboard.Name')}}</label>
                                <input type="text" value="{{$administration->name}}" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('dashboard.Email')}}</label>
                                <input type="text" value="{{$administration->email}}" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">{{__('dashboard.Password')}}</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>{{__('dashboard.Choose Role')}}</label>
                                <select name="roles[]" class="select2" multiple="multiple"
                                        data-placeholder=""
                                        style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option {{in_array($role->id,$roles_administration ) ? 'selected':''}}
                                                value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
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

@push('scripts')
    <!-- Select2 -->
    <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush
