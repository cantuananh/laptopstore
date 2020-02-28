@extends('backend.layouts.master')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thương Hiệu
                        <small>Thêm</small>
                    </h1>
                    @if(session('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session('message')}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('brands.store')}}" method="POST">
                            <div class="form-group">
                                <label>Tên thương hiệu*</label>
                                <input class="form-control" name="name" placeholder="Nhập tên thương hiệu" value="{!! old('name')!!}"/>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả*</label>
                                <input class="form-control" name="description" placeholder="Nhập mô tả" value="{!! old('description')!!}"/>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <a href="{{route('brands.index')}}" class="btn btn-default">Trở về</a>
                            {{csrf_field()}}
                            </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
