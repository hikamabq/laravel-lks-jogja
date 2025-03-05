<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // SELECT * FROM product
        $products = Products::all();
        return view('home', compact('products'));
    }

    public function product()
    {
        // SELECT * FROM product
        $products = Products::all();
        return view('product', compact('products'));
    }
    
    public function detail($id)
    {
        // SELECT * FROM product WHERE id = $id
        $product = Products::findOrFail($id);
        return view('detail', compact('product'));
    }
}
