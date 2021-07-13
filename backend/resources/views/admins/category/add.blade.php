@extends('layouts.admins')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Category', 'key'=>'Add'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" id="form-add" action="{{route('categories.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" >
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit"  class="btn btn-success">Submit</button>
                            <a href="{{route('menu.index')}}"><button type="button" class="btn btn-primary">Cancel</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
