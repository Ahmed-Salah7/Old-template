@extends('administration.layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container">
            @include('administration.partial.title',['title'=>'Activity Log'])
            <div class="row">
                <div class="col-12 card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class=" row">
                            <label class="col-sm-4 col-form-label">Action :</label>
                            <label class="col-sm-8 col-form-label">{{$activity->description}} </label>
                        </div>
                        <div class=" row">
                            <label class="col-sm-4 col-form-label">Model ID :</label>
                            <label class="col-sm-8 col-form-label">{{$activity->subject_id}} </label>
                        </div>
                        <div class=" row">
                            <label class="col-sm-4 col-form-label">Model Type :</label>
                            <label
                                class="col-sm-8 col-form-label">{{substr($activity->subject_type, strrpos($activity->subject_type, '/') + 11)}} </label>
                        </div>
                        <div class=" row">
                            <label class="col-sm-4 col-form-label">Causer Name :</label>
                            <label
                                class="col-sm-8 col-form-label">{{isset($activity->causer)?$activity->causer->name:'-'}} </label>
                        </div>

                        <div class=" row">
                            <label class="col-sm-4 col-form-label"> Causer Type:</label>
                            <label
                                class="col-sm-8 col-form-label">{{isset($activity->causer_type)?substr($activity->causer_type, strrpos($activity->causer_type, '/') + 11):'-'}} </label>
                        </div>
                        <div class=" row">
                            <label class="col-sm-4 col-form-label"> Causer Type:</label>
                            <label
                                class="col-sm-8 col-form-label">
                                <code>
                                    Attributes: @json ($activity->properties->toArray()['attributes'])<br>
                                    @isset($activity->properties->toArray()['old'])
                                        Old: @json ($activity->properties->toArray()['old'])@endisset
                                    {{--                                {{$activity->changes->old?$activity->changes->old:""}}--}}
                                </code>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop
