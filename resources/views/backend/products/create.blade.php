@extends("backend.layouts.master")
@section("content")
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>Thêm</small>
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @if(!empty(session('message')))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="name" placeholder="Nhập tên đầy đủ"
                                   value="{{old('name')}}"/>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu</label>
                            <select class="form-control" name="brand_id">
                                @foreach($brands as $brand)
                                    <option value='{{$brand->id}}'>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="description" class="form-control" name="description" name="description"
                                      rows="4" cols="5" placeholder="Nhập mô tả"
                            >{{old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" name="price" placeholder="Nhập đơn giá"
                                   value="{{old('price')}}"/>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ram</label>
                            <input class="form-control" name="ram" placeholder="Nhập dung lượng ram"
                                   value="{{old('ram')}}"/>
                            @error('ram')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Màn hình</label>
                            <input class="form-control" name="screen" placeholder="Nhập độ lớn màn hình"
                                   value="{{old('screen')}}"/>
                            @error('screen')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Vi xử lý</label>
                            <input class="form-control" name="microprocessors" placeholder="Nhập vi xử lý"
                                   value="{{old('microprocessors')}}"/>
                            @error('microprocessors')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hình đại diện</label>
                            <input type="file" class="form-control" name="image" placeholder="Nhập hình đại diện"
                                   value="{{old('image')}}"/>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="quantity" placeholder="Nhập số lượng"
                                   value="{{old('quantity')}}"/>
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Thời gian bảo hành</label>
                            <input class="form-control" name="guarantee_time" placeholder="Nhập thời gian bảo hành"
                                   value="{{old('guarantee_time')}}"/>
                            @error('guarantee_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <a href="{{route('products.index')}}" class="btn btn-default">Trở về</a>`
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
