@extends('layouts.main')

@section('main')
    @if (session()->has("succes"))
        <div class="position-fixed bottom-0 end-0 z-1">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="mb-0"><strong>{{ session("succes") }}</strong></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <section class="section profile">
        <div class="row">
        <div class="col-xl-12">

            <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link px-2 active" data-bs-toggle="tab" data-bs-target="#unpaid">Unpaid</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#paid">Paid</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#completed">Completed</button>
                    </li>
                </ul>
                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active unpaid" id="unpaid">
                        @if ($ordersUnpaid->count())
                            <div class="col-lg-10">
                                <table class="table table-responsive table-striped table-hover">
                                    <thead>
                                        <th>#</th>
                                        <th>Id</th>
                                        <th>User name</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Added at</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($ordersUnpaid as $orderUnpaid)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $orderUnpaid->transaction_id }}</td>
                                                <td>{{ $orderUnpaid->user_name }}</td>
                                                <td>{{ $orderUnpaid->product_name }}</td>
                                                <td>{{ number_format($orderUnpaid->product_price,0) }} x {{ $orderUnpaid->quantity }}</td>
                                                <td>{{ \Carbon\Carbon::parse($orderUnpaid->updated_at)->diffForHumans() }}</td>
                                                <td>{{ number_format($orderUnpaid->subtotal, 0) }}</td>
                                                <td>
                                                    <form action="/dashboard/orders/confirmAdmin/{{ $orderUnpaid->transaction_id }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="paid">
                                                        <input type="hidden" name="transaction_id" id="" value="{{ $orderUnpaid->transaction_id }}">
                                                        <button class="btn btn-outline-success">Set Paid</button>
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
                    </div>

                    <div class="tab-pane fade paid pt-3" id="paid">
                        @if ($ordersPaid->count())
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
                                        @foreach($ordersPaid as $paid)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $paid->product_name }}</td>
                                                <td>{{ number_format($paid->product_price,0) }}</td>
                                                <td>{{ $paid->quantity }}</td>
                                                <td>{{ \Carbon\Carbon::parse($paid->updated_at)->diffForHumans() }}</td>
                                                <td>{{ number_format($paid->subtotal, 0) }}</td>
                                                <td>
                                                    <form action="/dashboard/orders/confirmAdmin/{{ $paid->transaction_id }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="status" value="completed">
                                                        <input type="hidden" name="transaction_id" id="" value="{{ $paid->transaction_id }}">
                                                        <button class="btn btn-outline-success">Set Completed</button>
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
                    </div>

                    <div class="tab-pane fade completed pt-3" id="completed">
                        @if ($ordersCompleted->count())
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
                                        @foreach($ordersCompleted as $completed)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $completed->product_name }}</td>
                                                <td>{{ number_format($completed->product_price,0) }}</td>
                                                <td>{{ $completed->quantity }}</td>
                                                <td>{{ \Carbon\Carbon::parse($completed->updated_at)->diffForHumans() }}</td>
                                                <td>{{ number_format($completed->subtotal, 0) }}</td>
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
                    </div>

                {{-- <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form>

                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                    </form><!-- End Change Password Form -->

                </div> --}}

                </div><!-- End Bordered Tabs -->

            </div>
            </div>

        </div>
        </div>
    </section>
@endsection