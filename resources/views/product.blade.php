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
                    <div class="d-flex gap-2">
                        <a href="/detail/{{ $item->id }}" class="btn btn-danger w-75">Detail</a>
                        <a href="/add/{{ $item->id }}" class="btn btn-warning text-light w-25">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                        </a>
                    </div>
                </div><!-- Menu Item -->
            @endforeach


        </div>
    </div>
@endsection