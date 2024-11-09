@extends('layouts.app')

@section('content')
<div class="product-management serch">
    <form class="search-product mb-4">
        <input type="search" name="search" id="search" placeholder="Search here.....">
        <button type="submit" value="search" class="primary-button">Search</button>
    </form>
</div>
<div class="product-management">
    <div class="d-flex justify-content-between py-4">
        allProduct
        <div class="mb-3">
            <strong>Sort By:</strong>
            <a href="{{ route('products', ['sort_by' => 'name', 'sort_order' => (request('sort_by') == 'name' && request('sort_order') == 'asc') ? 'desc' : 'asc']) }}"
                class="btn btn-secondary">
                Sort by Name
                ({{ request('sort_by') == 'name' && request('sort_order') == 'asc' ? 'Descending' : 'Ascending' }})
            </a>

            <a href="{{ route('products', ['sort_by' => 'price', 'sort_order' => (request('sort_by') == 'price' && request('sort_order') == 'asc') ? 'desc' : 'asc']) }}"
                class="btn btn-secondary">
                Sort by Price
                ({{ request('sort_by') == 'price' && request('sort_order') == 'asc' ? 'Descending' : 'Ascending' }})
            </a>

        </div>
        <a href="{{ route('product.create') }}"><i class="fa-solid fa-plus"></i> Add Product</a>
    </div>
    <div class="table-wrapper">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <table class="table table-striped">
            <thead class="table-head">
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Product id</th>
                    <th scope="col">Name</th>
                    <th scope="col">image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->product_id }}</td>
                        <td>{{  substr(($item->name), 0, 20) . "..." }}</td>
                        <td style="width:15px"><img src="{{url('storage/' . $item->image)}}" alt="" class="w-100"></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>
                            <a href="{{ route('product.show', $item->id) }}"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('product.edit', $item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="delete-btn" data-id="{{ $item->id }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination d-flex justify-content-end">
        <nav aria-label="Page navigation example">
            {{ $items->links() }}
        </nav>
    </div>
</div>

<script>
    // jQuery for handling delete request with confirmation
    $(document).on('click', '.delete-btn', function () {
        var productId = $(this).data('id'); // Get the product ID
        var row = $(this).closest('tr'); // Get the row of the product to be deleted

        // Show a confirmation dialog before deleting
        if (confirm('Are you sure you want to delete this product?')) {
            // Send an AJAX request to delete the product
            $.ajax({
                url: '/product/delete/' + productId, // The URL to send the DELETE request
                type: 'DELETE', // HTTP method
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                },
                success: function (response) {
                    // On success, remove the row from the table
                    row.remove();
                    alert(response.success); // Show a success message (optional)
                },
                error: function (xhr, status, error) {
                    alert('Something went wrong. Please try again.'); // Error handling
                }
            });
        }
    });
</script>

@endsection