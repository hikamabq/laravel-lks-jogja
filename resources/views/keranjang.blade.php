@extends('layouts.app')
@section('content')
    <div class="container py-3">
        <h1>Keranjang Belanja</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <th>Item</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub Total</th>
            </thead>
            <tbody>
                @php
                    $total_belanja = 0;
                @endphp
                @foreach ($transaction as $item)
                @php
                    $total_belanja += $item->subtotal;
                @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$item->product->photo.'') }}" class="menu-img rounded-circle" width="50px" alt="">
                            {{ $item->product->name }}</td>
                        <td class="d-flex align-items-center">
                            <a href="/minus/{{ $item->id }}" class="btn btn-danger">-</a>
                            <div class="p-3">
                                {{ $item->jumlah }}
                            </div>
                            <a href="/plus/{{ $item->id }}" class="btn btn-danger">+</a>
                        </td>
                        <td>{{ number_format($item->harga) }}</td>
                        <td class="d-flex justify-content-between align-items-center">
                            <div>
                                {{ number_format($item->subtotal) }}
                            </div>
                            <a href="/delete/{{ $item->id }}" class="btn btn-warning">X</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="table-danger">
                <tr>
                    <td colspan="3" align="right">
                        Total : 
                    </td>
                    <td>
                        {{ number_format($total_belanja) }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection