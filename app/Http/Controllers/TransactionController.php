<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('status', 0)->get();
        return view('keranjang', compact('transaction'));
    }

    public function add($id)
    {
        $product = Products::findOrFail($id);


        $cek = Transaction::where('status', 0)->where('product_id', $id)->first();
        if($cek){
            // echo 'ada isinya';
            $jumlah = $cek->jumlah + 1;
            $cek->update([
                'jumlah' => $jumlah,
                'subtotal' => $cek->harga * $jumlah,
            ]);
        }else{
            // echo 'kosong';
            Transaction::create([
                'product_id' => $product->id,
                'jumlah' => 1,
                'harga' => $product->price,
                'subtotal' => $product->price * 1,
                'status' => 0,
            ]);
        }

        return redirect('/product');
    }
}
