@extends('layouts.app')

@section('content')
<div class="product-management mt-5">
    <div class="title py-4">
        Add to Product
    </div>
    <form action="{{  route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">product_id</label>
            <input type="text" class="form-control" name="product_id" value="{{ old('product_id') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product name</label>
            <input type="text" class="form-control" name="name" value="{{ old('product_id') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">stock</label>
            <input type="text" class="form-control" name="stock" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">image</label>
            <input type="file" class="form-control" name="image" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">description</label>
            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection