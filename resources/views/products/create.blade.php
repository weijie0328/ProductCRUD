@extends('layout')

@section('content')

<h2>Create Product</h2>

<form method="POST" action="/api/products">
@csrf

<input name="name" class="form-control" placeholder="Name"><br>

<select name="category_id" class="form-control">
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select><br>

<input name="price" class="form-control" placeholder="Price"><br>
<input name="stock" class="form-control" placeholder="Stock"><br>

<textarea name="description" class="form-control" placeholder="Description"></textarea><br>

<div class="form-check mt-2">
    <input class="form-check-input" type="checkbox" name="enabled" id="enabled" checked>
    <label class="form-check-label" for="enabled">
        Enabled
    </label>
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">
    ← Back to Products
</a>
</form>

@endsection