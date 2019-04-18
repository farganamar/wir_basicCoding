<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class ProductController extends Controller
{
    //frontend

    public function index()
    {
        $produk = Product::paginate(10);
        $category  = Category::all();
        return view('home', compact('produk', 'category'));
    }

    public function detail($slug)
    {
        $produk = Product::where('slug' , $slug)->get();
        $category  = Category::all();
        return view('detail-produk', compact('produk', 'category'));
    }


    //backend

    public function show()
    {
        $produk = Product::where('user_id' , Auth::user()->id)->get();
        $kategori  = Category::all();
        return view('crud.product.index', compact('produk', 'kategori'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $get_last_id = Product::max('id');
        $name = $request->file('image')->getClientOriginalName();
        $image = "images/$name";
        $produk = new Product;
        $produk->name = $request->name;
        $produk->slug = str_slug($request->name.$get_last_id+1, "-");
        $produk->deskripsi = $request->deskripsi;
        $produk->qty = $request->qty;
        $produk->price = $request->price;
        $produk->image = $image;
        $produk->category_id = $request->category;
        $produk->user_id = Auth::user()->id;
        $produk->save();

        $request->file('image')->move(public_path() . '/images/', $name);

        return  back();

    }

    public function edit(Request $request, $id)
    {

        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $name = $request->file('image')->getClientOriginalName();
        $image = "images/$name";
        $update = Product::find($id)->update([
            'name' => $request->name,
            'slug' => str_slug($request->name.$id, "-"),
            'deskripsi' => $request->deskripsi,
            'qty' => $request->qty,
            'price' => $request->price,
            'image' => $image,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);
        $request->file('image')->move(public_path() . '/images/', $name);

        return back();
    }

    public function delete($id)
    {
        $delete = Product::find($id)->delete();
        return back();
    }

    public function historyTransaction($id)
    {
        $history = Cart::where('product_id' , $id)->get();
        return $history;
    }
}
