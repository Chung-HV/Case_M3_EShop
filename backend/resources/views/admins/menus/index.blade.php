@extends('layouts.admins')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Menu', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success float-right m-2" href="{{route('menu.create')}}">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $key=>$menu)
                                <tr>
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$menu->name}}</td>
                                    <td>
                                        <a href="{{route('menu.edit', ['id'=>$menu->id])}}" methods="get"
                                           class="btn btn-info">Sửa</a> |
                                        <a href="{{route('menu.delete', ['id'=>$menu->id])}}" methods="get"
                                           class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{$menus->appends(request()->query())}} </div>
                </div>
            </div>
        </div>
    </div>
@endsection
