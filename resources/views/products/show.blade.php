@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>
    <div class="card">
        <div class="card-body d-flex">
            @if ($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="Product Image" width="200">
            @endif
            <div class="text mx-5">
            <h3> {{ $item->name }} </h3>
            <h5 class="card-title">Price: ${{ $item->price }}</h5>
            <p class="card-text">Description: {{ $item->description }}</p>
            <p class="card-text">Stock: {{ $item->stock ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Back to Products</a>

</div>
@endsection