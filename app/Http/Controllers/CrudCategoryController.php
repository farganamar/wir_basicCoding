<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Carbon;

class CrudCategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('crud.category.index', compact('category'));
    }

    public function tambah(Request $request)
    {
        $slug = str_slug($request->name, '-');
        $cek_slug = Category::where('slug', $slug)->first();
        if (!empty($cek_slug)) {
            return back()->with('error-slug', 'Gunakan nama Lain ,nama tersebut sudah ada . Atau gunakan kombinasi angka dan nama ! ');
        }
        $article = Category::insert([
            'name' => $request->name,
            'slug' => $slug,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return back();
    }

    public function edit(Request $request, $id)
    {
        $slug = str_slug($request->name, '-');
        $current_slug = Category::find($id);
        if ($slug != $current_slug->slug) {
            $cek_slug = Category::where('slug', $slug)->first();
            if (!empty($cek_slug)) {
                return back()->with('error-slug', 'Gunakan nama Lain , nama tersebut sudah ada . Atau gunakan kombinasi angka dan nama ! ');
            }
        }
        $article = Category::find($id)->update([
            'name' => $request->name,
            'slug' => $slug,
            'updated_at' => Carbon::now(),
        ]);
        return back();
    }

    public function delete($id)
    {
        $delete = Category::find($id)->delete();
        return back();
    }
}
