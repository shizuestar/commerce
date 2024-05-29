@extends('layouts.main')

@section('main')
    <div class="pagetitle">
        <h1>All Menu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row gx-4 ">
            <!-- Left side columns -->
                @foreach ($products as $product)
                    <div class="col col-lg-3">
                        <div class="card">
                            <img src="https://api.api-ninjas.com/v1/randomimage?category=nature" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title pb-0">{{ $product->name }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="d-flex align-items-center">
                                <a href="/detail/{{ $product->id }}" class="btn btn-primary">Detail</a>
                                <h2 class="badge text-warning mb-0 ms-auto">IDR {{ number_format($product->price,0) }}</h2>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </section>
@endsection