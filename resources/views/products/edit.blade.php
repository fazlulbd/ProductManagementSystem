@extends('layouts.app')
@section('content')
<div class="product-management mt-5">
    <div class="title py-4">
        Add to Product
    </div>
    <form action="{{  route('product.update',$item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">product_id</label>
            <input type="text" class="form-control" name="product_id" value="{{ $item->product_id }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product name</label>
            <input type="text" class="form-control" name="name" value="{{ $item->product_id }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{ $item->price }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">stock</label>
            <input type="text" class="form-control" name="stock" value="{{ $item->stock }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">image</label>
            <input type="file" name="image" class="form-control">
            @if ($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" alt="Product Image" width="100">
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">description</label>
            <textarea class="form-control" name="description" rows="3">{{ $item->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection