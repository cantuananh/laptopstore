@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm
                </h1>
            </div>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('products.update',['product'=>$product->id])}}" method="POST"
                      enctype="multipart/form-data">
                    @if(!empty(session('message')))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            {{session('message')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Tên sản phẩm (<span style="color: red">*</span>)</label>
                        <input class="form-control" name="name" placeholder="Nhập tên đầy đủ"
                               value="{{$product->name}}"/>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu (<span style="color: red">*</span>)</label>
                        <select class="form-control" name="brand_id">
                            @foreach($brands as $brand)
                                <option value='{{$brand->id}}'>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô tả (<span style="color: red">*</span>)</label>
                        <textarea id="description" class="form-control" name="description" rows="4" cols="5"
                                  placeholder="Nhập mô tả">
                                        {{$product->description}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Giá gốc (<span style="color: red">*</span>)</label>
                        <input class="form-control" name="cost" placeholder="Nhập giá gốc"
                               value="{{$product->cost}}"/>
                        @error('cost')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Giá (<span style="color: red">*</span>)</label>
                        <input class="form-control" name="price" placeholder="Nhập giá bán"
                               value="{{$product->price}}"/>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ram (<span style="color: red">*</span>)</label>
                        <input class="form-control" name="ram" placeholder="Nhập dung lượng ram"
                               value="{{$product->ram}}"/>
                        @error('ram')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Màn hình (<span style="color: red">*</span>)</label>
                        <input class="form-control" name="screen" placeholder="Nhập độ lớn màn hình"
                               value="{{$product->screen}}"/>
                        @error('screen')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Vi xử lý (<span style="color: red">*</span>)</label>
                        <input class="form-control" name="microprocessors" placeholder="Nhập vi xử lý"
                               value="{{$product->microprocessors}}"/>
                        @error('microprocessors')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hình đại diện</label>
                        <img src="uploads/products/{{$product->image}}" height="100"
                             width="150">
                        <input type="file" class="form-control" name="image" placeholder="Nhập hình đại diện"
                               value="{{$product->image}}"/>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Thời gian bảo hành (<span style="color: red">*</span>)</label>
                        <input class="form-control" name="guarantee_time" placeholder="Nhập thời gian bảo hành"
                               value="{{$product->guarantee_time}}"/>
                        @error('guarantee_time')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success" name='ok'>Lưu lại</button>
                    <a href="{{route('products.index')}}" class="btn btn-primary">Trở về</a>
                    {{csrf_field()}}
                    @method('PATCH')
                </form>
            </div>
        </div>
    </div>
@endsection
