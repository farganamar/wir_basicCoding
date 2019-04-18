<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class CategoryController extends Controller
{
    //

    public function show($slug)
    {
        $category = Category::all();
        $kategori =  Category::where('slug', $slug)->first();
        $article = Article::where('category_id' , $kategori->id)->orderBy('created_at' , 'desc')->paginate(5);
        return view('category', compact('kategori', 'category' , 'article' ));
    }
}
