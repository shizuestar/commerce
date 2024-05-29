@extends('layouts.main')

@section('main')
    <div class="col-lg-8">
        @if (session()->has("succes"))
            <div class="position-fixed bottom-0 end-0 z-1">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session("succes") }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="pagetitle">
            <h1>Manage Products</h1>
        </div>
        <a href="/dashboard/products/create" class="btn btn-outline-primary mb-3">Add new Product</a>
        <table class="table table-responsive table-striped table-hover">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="/dashboard/products/{{ $product->id }}/edit" class="">Edit</a>
                        <form action="/dashboard/products/{{ $product->id }}" method="post" class="d-inline">
                            @method("delete")
                            @csrf
                            <button class="border-0 text-danger bg-transparent" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection