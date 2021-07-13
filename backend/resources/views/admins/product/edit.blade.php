@extends('layouts.admins')
@section('title')
    <title>Product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/product/add/add.css')}}"/>

@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Product', 'key'=>'Edit'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('product.update', ['id'=>$product->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục </label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control" name="price" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        <img class="product_image" src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                                <label>Ảnh đại diện</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($product->images as $productImg)
                                            <div class="col-md-3">
                                                <img class = "product_image_detail" src="{{$productImg->image_path}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="timymce" class="form-control my-editor" rows="3" name="contents" >{{$product->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                    @foreach($product->tags as $tag)
                                        <option value="{{$tag->name}}" selected>{{$tag->name}}</option>
                                    @endforeach
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

@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{asset('admin/product/add/add.js')}}"></script>
@endsection

