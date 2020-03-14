<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{$title}}</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
                <div class="float-sm-right title-btns">
                    @if(isset($create_link))
                        <a href="{{route($create_link)}}">
                            <button type="button" class="btn btn-success  float-sm-right">{{__('dashboard.Create')}}</button>
                        </a>
                    @endif

                    @if(isset($edit_link))
                        <a href="{{route($edit_link,$model_id)}}">
                            <button type="button" class="btn btn-info">{{__('dashboard.Edit')}}</button>
                        </a>
                    @endif

                    @if(isset($delete_link))
                        <a onclick="event.preventDefault(); document.getElementById('{{$model_id}}-button-logout').submit();"
                           href="#">
                            <button class="btn btn-danger">{{__('dashboard.Delete')}}</button>
                        </a>
                        <form id="{{$model_id}}-button-logout" action="{{route($delete_link, $model_id)}}"
                              method="post">
                            <input name="_method" type="hidden" value="delete">
                            <input type="hidden" name="_token" value={{csrf_token()}}>
                        </form>
                    @endif
                    @if(isset($archive_link))
                        <a style="margin-right:10px" href="{{route($archive_link)}}">
                            <button type="button" class="btn btn-info">{{__('dashboard.archive')}}</button>
                        </a>
                    @endif
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
