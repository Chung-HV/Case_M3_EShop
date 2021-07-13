@extends('layouts.admins')
@section('title')
    <title>Product</title>
@endsection
@section('css')
    <link rel='stylesheet' href="{{asset('admin/product/index/list.css')}}">
@endsection
@section('header')
    @include('partials.header-product')
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header', ['name'=>'Product', 'key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('product_add')
                            <a class="btn btn-success float-right m-2" href=" {{route('product.create')}}">Add</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{number_format($product->price)}}</td>
                                    <td>
                                        <img class="product_image" src="{{$product->feature_image_path}}" alt="">
                                    </td>
                                    <td>{{optional($product->category)->name}}</td>
                                    <td>
                                        <a href="{{route('product.edit',['id'=>$product->id])}}"
                                           class="btn btn-info">Sửa</a>
                                        |

                                        <a data-url="{{route('product.delete',['id'=>$product->id])}}" methods="get"
                                           class="btn btn-danger action_delete">Xóa</a>
                                        |
                                        <a href="{{route('product.detail',['id'=>$product->id])}}" methods="get"
                                           class="btn btn-primary">Chi tiết</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admin/product/index/list.js')}}"></script>
@endsection
