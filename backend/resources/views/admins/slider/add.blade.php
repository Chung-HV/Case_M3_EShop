@extends('layouts.admins')
@section('title')
    <title>Slider</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin/product/add/add.css')}}"/>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Slider', 'key'=>'Add'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group  @error('name') is-invalid @enderror">
                                <label>Tên Slider</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nhập tên slider">
                            </div>
                            <div class="form-group  @error('image_path') is-invalid @enderror">
                                <label>Ảnh</label>
                                <input type="file" class="form-control-file" name="image_path">
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group  @error('description') is-invalid @enderror">
                                <label>Mô Tả</label>
                                <textarea class="form-control" name="description" value="{{old('description')}}"></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('slider.index')}}"><button type="button" class="btn btn-primary">Cancel</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
