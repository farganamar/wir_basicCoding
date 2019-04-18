<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CrudArticleController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->jabatan != "admin"){
            $article =  Article::where('user_id' , Auth::user()->id)->get();
        }
        else{

            $article = Article::all();
        }
        $kategori = Category::all();
        return view('crud.article.index' , compact('article', 'kategori'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $name = $request->file('banner')->getClientOriginalName();
        $banner = "images/$name";
        $slug = str_slug($request->title, '-');
        $cek_slug = Article::where('slug' , $slug)->first();
        if(!empty($cek_slug)){
            return back()->with('error-slug' , 'Gunakan Judul Lain , Judul tersebut sudah ada . Atau gunakan kombinasi angka dan judul ! ');
        }
        $article = Article::insert([
            'title' => $request->title,
            'category_id' =>$request->category,
            'content' => $request->content,
            'slug' => str_slug($request->title, '-'),
            'banner' => $banner,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $request->file('banner')->move(public_path() . '/images/', $name);

        return back()->with('success' , 'sukses');

    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $name = $request->file('banner')->getClientOriginalName();
        $banner = "images/$name";
        $slug = str_slug($request->title, '-');
        $current_slug = Article::find($id);
        if($slug != $current_slug->slug){
            $cek_slug = Article::where('slug', $slug)->first();
            if (!empty($cek_slug)) {
                return back()->with('error-slug', 'Gunakan Judul Lain , Judul tersebut sudah ada . Atau gunakan kombinasi angka dan judul ! ');
            }

        }
        $article = Article::find($id)->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'content' => $request->content,
            'slug' => str_slug($request->title, '-'),
            'banner' => $banner,
            'user_id' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $request->file('banner')->move(public_path() . '/images/', $name);

        return back()->with('success', 'sukses');
    }

    public function delete($id)
    {
        $article = Article::find($id)->delete();

        return back();
    }

}
