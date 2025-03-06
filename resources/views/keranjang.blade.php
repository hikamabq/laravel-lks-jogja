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
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ number_format($item->harga) }}</td>
                        <td>{{ number_format($item->subtotal) }}</td>
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