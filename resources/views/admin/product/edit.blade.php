@extends('layout')
@section('title','Cập nhật sản phẩm')

@section('content')
<br><br>
<h3>Cập nhật sản phẩm</h3>
<br><br>
<form action="{{route('admin.products.update',['id'=>$products->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" value="{{$products->name}}" class="form-control">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" name="price" value="{{$products->price}}" min="0" class="form-control">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" name="quantity" min="1" value="{{$products->quantity}}" class="form-control">
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
                <input type="file" name="image" class="form-control">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class="div">
                    @if($products->image)
                    <img src="{{asset('upload/product/' . $products->image)}}" width="200px" height="200px" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="category_id" class="form-control">
                    <option value=""></option>
                    @foreach($category as $cate)
                    <option value="{{$cate->id}}" {{$cate->id == $products->category_id ? 'selected' : ''}}>{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Mô tả ngắn</label>
        <input type="text" name="short_content" value="{{$products->short_content}}" class="form-control">
        @error('short_content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Nội dung</label>
        <textarea class="form-control" id="summary-ckeditor" name="long_content">{!!$products->short_content!!}</textarea>
        @error('long_content')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-primary" href="{{route('admin.users.index')}}">Quay lại</a>
</form>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('summary-ckeditor', {
        filebrowserUploadUrl: "{{route('admin.products.update',['id'=>$products->id], ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection