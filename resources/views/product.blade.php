@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <h1>Product</h1>
        <div class="row gy-5">
            @foreach ($products as $item)
                <div class="col-lg-3 menu-item">
                    <a href="{{ asset('storage/'.$item->photo.'') }}" class="glightbox">
                        <img src="{{ asset('storage/'.$item->photo.'') }}" class="menu-img img-fluid" alt="">
                    </a>
                    <h4>{{ $item->name }}</h4>
                    <p class="ingredients">
                        Stock : {{ $item->stock }}
                    </p>
                    <p class="price">
                        {{ number_format($item->price) }}
                    </p>
                    <div>
                        <a href="/detail/{{ $item->id }}" class="btn btn-danger w-100">Detail</a>
                    </div>
                </div><!-- Menu Item -->
            @endforeach


        </div>
    </div>
@endsection