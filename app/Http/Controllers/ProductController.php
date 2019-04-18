<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    //

    public function index()
    {
        $produk = Product::paginate(10);
        $category  = Category::all();
        return view('home', compact('produk', 'category'));
    }
}
