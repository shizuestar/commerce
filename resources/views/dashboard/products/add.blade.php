@extends('layouts.main')

@section('main')
    <div class="row justify-content-center pt-3">
        <div class="col-lg-8">
            <div class="card p-3">
                <h2 class="text-center">Add new Product</h2>
                <form action="/dashboard/products" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="inputName" class="form-label">Product Name</label>
                        <input type="text" autocomplete="off" class="form-control @error("name") is-invalid @enderror" placeholder="Name oroduct" id="inputName" name="name" value="{{ old("name") }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputPrice" class="form-label">Product Price</label>
                        <input type="number" autocomplete="off" class="form-control @error("price") is-invalid @enderror" placeholder="Price product" id="inputPrice" name="price" value="{{ old("price") }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputStock" class="form-label">Product Stock</label>
                        <input type="number" autocomplete="off" class="form-control @error("stock") is-invalid @enderror" placeholder="Default stock product" id="inputStock" name="stock" value="{{ old("stock") }}">
                        @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Short description of product" id="floatingTextarea2" name="description" style="height: 150px">{{ old("description") }}</textarea>
                            <label for="floatingTextarea2">Short Description</label>
                        </div>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <mb-3>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product image</label>
                            <input class="form-control" type="file" id="formFile" name="images[]" multiple>
                          </div>
                    </mb-3>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection