<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
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

    public function minus($id)
    {
        $transaction = Transaction::findOrFail($id);

        // dicek dulu sebelum di update. tidak boleh 0. jika 1 terus di minus langsung dihapus aja
        if($transaction->jumlah == 1){
            $transaction->delete();
        }else{
            $transaction->update([
                'jumlah' => $transaction->jumlah - 1,
            ]);
            $transaction->update([
                'subtotal' => $transaction->harga * $transaction->jumlah
            ]);
        }
        return redirect('/transaction'); 
    }
    public function plus($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'jumlah' => $transaction->jumlah + 1,
        ]);
        $transaction->update([
            'subtotal' => $transaction->harga * $transaction->jumlah
        ]);
        return redirect('/transaction'); 
    }
    public function delete($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect('/transaction'); 
    }

    public function order(Request $request)
    {
        Order::create([
            'nama_pembeli' => $request->nama_pembeli,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'nomor_nota' => $request->nomor_nota,
        ]);

        Transaction::where('status', 0)->update([
            'status' => 1,
            'nomor_nota' => $request->nomor_nota
        ]);

        return redirect('/selesai');
    }

    public function selesai()
    {
        return view('selesai');
    }
}
