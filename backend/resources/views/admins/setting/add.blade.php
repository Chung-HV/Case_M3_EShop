@extends('layouts.admins')
@section('title')
    <title>Setting</title>
@endsection

@section('css')
    <link rel = 'stylesheet' href = "{{asset('admin/setting/index/index.css')}}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'Setting', 'key'=>'Add'])
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{route('setting.store').'?type='.request()->type}}">
                            @csrf
                            <div class="form-group">
                                <label>Config Key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror" name="config_key" placeholder="Nhập config key">
                                @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if(request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <input type="text" class="form-control @error('config_value') is-invalid @enderror" name="config_value" placeholder="Nhập config value">
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif(request()->type === 'Textarea')
                            <div class="form-group">
                                <label>Config Value</label>
                                <textarea name="config_value" class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập config value" rows="5"></textarea>
                                @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('setting.index')}}"><button type="button" class="btn btn-primary">Cancel</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

