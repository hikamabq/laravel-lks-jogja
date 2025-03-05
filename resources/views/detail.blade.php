@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <h1>Product Detail</h1>
        <div class="row gy-5">
            <div class="col-md-6">
                <a href="{{ asset('storage/'.$product->photo.'') }}" class="glightbox">
                    <img src="{{ asset('storage/'.$product->photo.'') }}" class="menu-img img-fluid" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <h3>{{ $product->name }}</h3>
                <p>{!! $product->description !!}</p>
                <p>Rp {{ number_format($product->price) }}</p>
                <p>Stok : {{ $product->stock }}</p>
                <div>
                    <a href="" class="btn btn-danger w-50 mb-2">Belanja Sekarang</a>
                    <a href="https://wa.me/6285600929282" class="btn btn-success w-50"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /><path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" /></svg> Tanya Admin</a>
                </div>
            </div>
        </div>
    </div>
@endsection