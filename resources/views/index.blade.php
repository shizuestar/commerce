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
        <section class="section dashboard">
            <div class="row row-cols-2 row-cols-lg-3 g-4 ">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card">
                            @if ($product->PicProduct->count())
                                <div id="carouselExample{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product->PicProduct as $pic)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ asset("storage/" . $pic->name) }}" class="d-block w-100" alt="{{ $product->name }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $product->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $product->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endif
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
    @else
        <div class="row justify-content-center align-items-center" style="height: 80vh">
            <div class="col-12" >
                <p class="text-center">No Data Found!</p>
            </div>
        </div>
    @endif
@endsection