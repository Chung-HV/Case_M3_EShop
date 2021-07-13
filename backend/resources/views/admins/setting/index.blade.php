@extends('layouts.admins')
@section('title')
    <title>Setting</title>
@endsection
@section('css')
    <link rel = 'stylesheet' href = "{{asset('admin/setting/index/index.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Setting', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                               Add Setting
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('setting.create').'?type=Text'}}">Text</a></li>
                                <li><a href="{{route('setting.create').'?type=Textarea'}}">Textarea</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $key=>$setting)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$setting->config_key}}</td>
                                    <td>{{$setting->config_value}}</td>
                                    <td>
                                        <a href="{{route('setting.edit', ['id'=> $setting->id]).'?type='.$setting->type}}"
                                               class="btn btn-info">Sửa</a>
                                        |
                                        <a data-url="{{route('setting.delete',['id'=>$setting->id])}}" methods="get"
                                               class="btn btn-danger action_delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{$settings->appends(request()->query())}} </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin/product/index/list.js')}}"></script>
@endsection

