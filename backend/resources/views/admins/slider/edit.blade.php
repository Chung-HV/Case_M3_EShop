@extends('layouts.admins')
@section('title')
    <title>Slider</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/product/add/add.css')}}"/>

@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Slider', 'key'=>'Edit'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('slider.update',['id'=>$slider->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên Slider</label>
                                <input type="text" class="form-control" name="name" value="{{$slider->name}}">
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <img class="product_image_detail" src="{{$slider->image_path}}" alt="">
                                    </div>
                                </div>
                                <input type="file" class="form-control-file" name="image_path">
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea class="form-control" name="description">{{$slider->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('admin/product/add/add.js')}}"></script>
@endsection

