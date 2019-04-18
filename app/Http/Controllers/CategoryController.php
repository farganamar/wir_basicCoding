<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    //

    public function show($slug)
    {
        $category = Category::all();
        $kategori =  Category::where('slug', $slug)->first();
        $produk = Product::where('category_id' , $kategori->id)->orderBy('created_at' , 'desc')->paginate(5);
        return view('category', compact('kategori', 'category' , 'produk' ));
    }
}
