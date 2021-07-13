@extends('layouts.admins')
@section('title')
    <title>Role</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin/product/add/add.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/role/add.css')}}"/>

@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Role', 'key'=>'edit'])
        <div class="content">

            <div class="container-fluid">
                <form method="post" action="{{route('role.update', ['id'=>$role->id])}}">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control" name="name" value="{{$role->name}}"
                                       placeholder="Nhập tên vai trò">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea name="display_name" class="form-control" cols="6" rows="5"
                                          placeholder="Nhập mô tả vai trò">{{$role->display_name}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="checkall">
                                        Checkall
                                    </label>
                                </div>
                                @foreach($permissionParents as $permissionParent)
                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>
                                            Modul {{$permissionParent->name}}
                                        </div>
                                        <div class="row">
                                            @foreach($permissionParent->permissionChirlds as $permissionChirld)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]"
                                                                   {{$permissionsChecked->contains('id', $permissionChirld->id) ? 'checked' : ''}}
                                                                   value="{{$permissionChirld->id}}"
                                                                   class="checkbox_childrent">
                                                        </label>
                                                        {{$permissionChirld->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('admin/role/add.js')}}">

    </script>
@endsection

