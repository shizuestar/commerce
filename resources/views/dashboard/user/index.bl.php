@extends('layouts.main')

@section('main')
    @if (session()->has("succes"))
        <div class="position-fixed bottom-0 end-0 z-1">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="mb-0">{{ session("succes") }}<strong><a href="https://wa.me/6288221339914" target="_blank" class="text-dark"> Confirm paid in here!</a></strong></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($carts->count())
        <div class="col-lg-10">
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
                                <form action="/dashboard/user/carts/checkout/{{ $cart->transaction_id }}" method="post">
                                    @csrf
                                    <input type="hidden" name="transaction_id" id="" value="{{ $cart->transaction_id }}">
                                    <button class="btn btn-outline-success">Check Out</button>
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
                <p class="text-center">No Data Orders!</p>
            </div>
        </div>
    @endif
@endsection