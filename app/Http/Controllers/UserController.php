<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Request\CreateValidatonRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // public function editFoto(Request $request){
    //     $gambar = $_FILES['gambar'];
    //     if($gambar['type']=='image/png' or $gambar['type']=='image/jpg' or $gambar['type']=='image/jpeg'){
    //         if($gambar['size']<10000){
    //             if($gambar['error']==0){
    //                 move_uploaded_file($gambar['tmp_name'], '../public/img/'.$gambar['name']);
    //                 User::find(auth()->user()->id)->update([
    //                     'image'=>$gambar['name']
    //                 ]);
    //                 return back();
    //             }else{
    //                 return "error tidak diketahui";
    //             }
    //         }else{
    //             return "File Size Terlalu Besar";
    //         }
    //     }else{
    //         return "Hanya gambar bertipe jpg, png, dan jpeg yang dapat diupload";
    //     }
    // }

    public function editFoto(Request $request){
        $request->validate([
            'gambar'=>'required|mimes:jpg,png,jpeg'
        ]);
        $nama =  'foto' .  '-' .time() .'.'.$request->file('gambar')->extension();
        $request->gambar->move(public_path('img'),$nama);
        User::find(auth()->user()->id)->update([
            'image'=>$nama
        ]);
        return back();
    }

    public function edit(Request $request){
        $kelas = 0;
        $nisn  = 0;
    	    if(isset($request->kelas)){
    	        $kelas = $request->kelas;
    	    }
    	    if(isset($request->nisn)){
    	        $nisn = $request->nisn;
    	    }
        User::find(auth()->user()->id)->update([
            'name'=>$request->nama,
            'kelas'=>$kelas,
            'jenis_kelamin'=>$request->jenis,
            'nisn'=>$nisn,
            'no_hp'=>$request->hp,
            'agama'=>$request->agama,
            'alamat'=>$request->alamat
        ]);
        return back();
    }

    public function password(Request $request){
        $user = User::where('email',$request->email)->get();
        if(count($user)>=1){
            if (password_verify($request->password, $user[0]->password)) {
                User::find(auth()->user()->id)->update([
                    'password'=>Hash::make($request->passwordbaru)
                ]);
                return redirect('logout');
            }   else{
                return "Password Anda Salah <a href='/password'>Kembali</a>";
            }
        }else{
            return "Alamat Email Anda Salah <a href='/password'>Kembali</a>";
        }
    }
}
