<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function index()
    {
        $user = User::all();
        return view('crud.user.index' , compact('user'));
    }

    public function ubahJabatan($id)
    {
        $cek_jabatan = User::find($id);
        if($cek_jabatan->jabatan == "admin"){
            $update = User::find($id)->update(['jabatan' => 'author']);
        }
        else if($cek_jabatan->jabatan == "author"){
            $update = User::find($id)->update(['jabatan' => 'admin']);
        }
        return back();
    }

    public function tambah(Request $request)
    {
        $cek_email = User::where('email' , $request->email)->first();
        if(!empty($cek_email)){
            return back()->with("error-email", 'email tersebut sudah ada !');
        }
        $tambah = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make("user123456"),
            'jabatan' => $request->jabatan
        ]);
        return back();
    }

    public function edit(Request $request, $id)
    {
        $curr_email = User::find($id);
        if($curr_email->email == $request->email){
            $update = User::find($id)->update([
                'name' => $request->name,
                'jabatan' => $request->jabatan
            ]);
        }
        else{
            $cek_email = User::where('email', $request->email)->first();
            if (!empty($cek_email)) {
                return back()->with("error-email", 'email tersebut sudah ada !');
            }
            $update = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'jabatan' => $request->jabatan
            ]);
        }
        return back();
    }

    public function delete($id)
    {
        $user = User::find($id)->delete();
        return back();
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('crud.user.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id)->update([
            'name' => $request->name,
        ]);
        return back();
    }

    public function cekPassword(Request $request, $id, $password)
    {
        $pass = User::find($id);
        if(Hash::check($password, $pass->password)){
            return "true";
        }
        else{
            return "false";
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $update = User::find($id)->update([
            'password' => Hash::make($request->new_pass),
        ]);
        return back()->with("success" , "Sukses Merubah Password ");
    }


}
