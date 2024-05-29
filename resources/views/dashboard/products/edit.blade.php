@extends('layouts.main')

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/products/{{ $product->id }}">
            @method("put")
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error("name") is-invalid @enderror" id="name" name="name" required value="{{ old("name", $product->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control @error("price") is-invalid @enderror" id="price" name="price" required value="{{ old("price", $product->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control @error("stock") is-invalid @enderror" id="stock" name="stock" required value="{{ old("stock", $product->stock) }}">
                @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 150px">{{ old("description", $product->description) }}</textarea>
                    <label for="floatingTextarea2">Descripion</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update product</button>
        </form>
    </div>
@endsection