@extends('layouts.admins')
@section('title')
    <title>User</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/product/add/add.css')}}"/>

@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'User', 'key'=>'Add'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('user.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                       placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}"
                                       placeholder="Nhập Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{old('password')}}"
                                       placeholder="Nhập password">
                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value="">admin</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('user.index')}}"><button type="button" class="btn btn-primary">Cancel</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder': 'chọn vai trò'

        })
    </script>
@endsection
