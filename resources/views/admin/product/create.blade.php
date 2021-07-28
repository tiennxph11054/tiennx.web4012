@extends('layout')
@section('title','Thêm sản phẩm')

@section('content')
<br><br>
<h3>Thêm mới sản phẩm</h3>
<br><br>
<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="price" value="{{old('price')}}" class="form-control">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control">
                @error('quantity')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="category_id" class="form-control">
                    <option value=""></option>
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-floating">
        <label for="floatingTextarea2">Mô tả ngắn</label>
        <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="short_content"></textarea>
        @error('short_content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Nội dung</label>
        <textarea class="form-control" id="summary-ckeditor" name="long_content"></textarea>
        @error('long_content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.products.index')}}">Quay lại</a>
</form>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor', {
        filebrowserUploadUrl: "{{route('admin.products.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection