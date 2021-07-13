@extends('layouts.admins')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Category', 'key'=>'Edit'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('menu.update',['id'=>$menu->id])}}">
                            @csrf
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text" class="form-control" name="name" value="{{$menu->name}}" placeholder="Nhập tên menu">
                            </div>
                            <div class="form-group">
                                <label>Chọn menu cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

