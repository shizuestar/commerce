@extends('layouts.main')

@section('main')
<div class="col-lg-10">
    @if (session()->has("succes"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session("succes") }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-responsive table-striped table-hover">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity Product</th>
            <th>Added at</th>
            <th>Total</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cart->product_name }}</td>
                    <td>{{ number_format($cart->product_price,0) }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ \Carbon\Carbon::parse($cart->updated_at)->diffForHumans() }}</td>
                    <td>{{ number_format($cart->subtotal, 0) }}</td>
                    <td>
                        <a href="">Checkout</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection