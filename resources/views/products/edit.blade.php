@extends('layout')

@section('content')

<h2>Edit Product</h2>

<form method="POST" action="/api/products/{{ $product->id }}">
@csrf
@method('PUT')

<input name="name" value="{{ $product->name }}" class="form-control"><br>

<select name="category_id" class="form-control">
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select><br>

<input name="price" value="{{ $product->price }}" class="form-control"><br>
<input name="stock" value="{{ $product->stock }}" class="form-control"><br>

<textarea name="description" class="form-control" placeholder="Description">{{ $product->description }}</textarea><br>

<div class="form-check mt-2">
    <input class="form-check-input" type="checkbox" name="enabled" id="enabled"
        {{ $product->enabled ? 'checked' : '' }}>
    <label class="form-check-label" for="enabled">
        Enabled
    </label>
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">
    ← Back to Products
</a>
</form>

@endsection