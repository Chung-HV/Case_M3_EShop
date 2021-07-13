@extends('layouts.admins')
@section('title')
    <title>Permission</title>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Permission', 'key'=>'Add'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{route('permission.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Chọn tên modul</label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn tên modul</option>
                                    @foreach(config('permissions.table_module') as $table_modul)
                                        <option value="{{$table_modul}}">{{$table_modul}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach(config('permissions.module_child') as $module_child)
                                        <div class="col-md-3">
                                            <label for="">
                                                <input type="checkbox" name="module_child[]" value="{{$module_child}}">
                                                {{$module_child}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('role.index')}}"><button type="button" class="btn btn-primary">Cancel</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


