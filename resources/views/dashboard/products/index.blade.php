@extends('layouts.main')

@section('main')
    @if (session()->has("succes"))
        <div class="position-fixed bottom-0 end-0 z-1">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session("succes") }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($products->count())
        <div class="col-lg-8">

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
                        <td>{{ number_format($product->price,0) }}</td>
                        <td>{{ number_format($product->stock,0) }}</td>
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
    @else
        <div class="row justify-content-center align-items-center" style="height: 80vh">
            <div class="col-12" >
                <p class="text-center">No Data Products!</p>
            </div>
        </div>
    @endif
@endsection