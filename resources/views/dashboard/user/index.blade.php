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
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link px-2 active" data-bs-toggle="tab" data-bs-target="#uncheckout">Uncheckout</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#unpaid">Unpaid</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#paid">Paid</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#completed">Completed</button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active uncheckout" id="uncheckout">
                                @if ($uncheckout->count())
                                    <div class="col-lg-12">
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
                                                @foreach($uncheckout as $uncheck)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $uncheck->product_name }}</td>
                                                        <td>{{ number_format($uncheck->product_price,0) }}</td>
                                                        <td>{{ $uncheck->quantity }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($uncheck->updated_at)->diffForHumans() }}</td>
                                                        <td>{{ number_format($uncheck->subtotal, 0) }}</td>
                                                        <td>
                                                            <form action="/dashboard/user/carts/checkout/{{ $uncheck->transaction_id }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="transaction_id" id="" value="{{ $uncheck->transaction_id }}">
                                                                <button class="btn btn-outline-success">Check Out</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="row justify-content-center align-items-center" style="min-height: 60vh">
                                        <div class="col-12" >
                                            <p class="text-center">No Data Orders!</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="tab-pane fade unpaid pt-3" id="unpaid">
                                @if ($unpaids->count())
                                    <div class="col-lg-12">
                                        <table class="table table-responsive table-striped table-hover">
                                            <thead>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity Product</th>
                                                <th>Added at</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                                @foreach($unpaids as $unpaid)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $unpaid->product_name }}</td>
                                                        <td>{{ number_format($unpaid->product_price,0) }}</td>
                                                        <td>{{ $unpaid->quantity }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($unpaid->updated_at)->diffForHumans() }}</td>
                                                        <td>{{ number_format($unpaid->subtotal, 0) }}</td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="row justify-content-center align-items-center" style="min-height: 60vh">
                                        <div class="col-12" >
                                            <p class="text-center">No Data Orders!</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="tab-pane fade paid pt-3" id="paid">
                                @if ($paids->count())
                                    <div class="col-lg-12">
                                        <table class="table table-responsive table-striped table-hover">
                                            <thead>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity Product</th>
                                                <th>Added at</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                                @foreach($paids as $paid)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $paid->product_name }}</td>
                                                        <td>{{ number_format($paid->product_price,0) }}</td>
                                                        <td>{{ $paid->quantity }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($paid->updated_at)->diffForHumans() }}</td>
                                                        <td>{{ number_format($paid->subtotal, 0) }}</td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="row justify-content-center align-items-center" style="min-height: 60vh">
                                        <div class="col-12" >
                                            <p class="text-center">No Data Orders!</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="tab-pane fade completed pt-3" id="completed">
                                @if ($completeds->count())
                                    <div class="col-lg-12">
                                        <table class="table table-responsive table-striped table-hover">
                                            <thead>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity Product</th>
                                                <th>Added at</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                                @foreach($completeds as $complete)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $complete->product_name }}</td>
                                                        <td>{{ number_format($complete->product_price,0) }}</td>
                                                        <td>{{ $complete->quantity }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($complete->updated_at)->diffForHumans() }}</td>
                                                        <td>{{ number_format($complete->subtotal, 0) }}</td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="row justify-content-center align-items-center" style="min-height: 60vh">
                                        <div class="col-12" >
                                            <p class="text-center">No Data Orders!</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection