@extends('layout')

@section('content')

<h2>Products</h2>

<a href="/products/create" class="btn btn-primary mb-3">Add Product</a>

<button id="bulkDeleteBtn" class="btn btn-danger mb-3">Bulk Delete</button>

<form method="GET" action="{{ route('products.index') }}" class="mb-3">

    <div class="row">

        <div class="col-md-4">
            <select name="category_id" class="form-control">
                <option value="">-- All Categories --</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary">
                Filter
            </button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Reset
            </a>
        </div>

    </div>

</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAll"></th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Enabled</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
        <tr>
            <td><input type="checkbox" class="productCheckbox" value="{{ $product->id }}"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? '-' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->enabled ? 'Yes' : 'No' }}</td>
            <td>
                <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $product->id }}">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$('#selectAll').click(function () {
    $('.productCheckbox').prop('checked', this.checked);
});

$('.deleteBtn').click(function () {
    let id = $(this).data('id');

    $.ajax({
        url: '/api/products/' + id,
        type: 'DELETE',
        success: function () {
            location.reload();
        }
    });
});

$('#bulkDeleteBtn').click(function () {
    let ids = [];

    $('.productCheckbox:checked').each(function () {
        ids.push($(this).val());
    });

    $.post('/api/products/bulk-delete', {ids: ids, _token: '{{ csrf_token() }}'}, function () {
        location.reload();
    });
});
</script>

@endsection