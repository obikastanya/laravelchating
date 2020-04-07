<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use App\user;
use Auth;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $id =Auth::user()->id;
        $data =User::where('id', $id)->first()->get();
        foreach($data as $d){
            $user[0]=$d->name;
            $user[1]=$d->tgl_lahir;
            $user[2]=$d->jenis_kelamin;
            $user[3]=$d->email;
        }
        return view('profile',['user'=>$user]);
    }
    
    public function update(Request $request){
        $id =Auth::user()->id;

        $user= User::find($id);
        $hasher=app('hash');
        if($hasher->check($request->password, $user->password)){
        User::where('id', $id)
        ->update([
        'name' => $request->name, 
        'tgl_lahir'=>$request->tgl_lahir,
        'email'=>$request->email,
        'jenis_kelamin'=>$request->jenis_kelamin
        ]); 
        return redirect('/')->with('message', 'Data Berhasil diUbah');      
        }
        else{
            return redirect('/')->with('message', 'Data Gagal diUbah');      
        }
    }
    public function updatePassword(Request $request){
        $id =Auth::user()->id;
        $user= User::find($id);
        $hasher=app('hash');
        if($request->newPassword==$request->passwordConfirm){
        if($hasher->check($request->oldPassword, $user->password)){
            User::where('id', $id)
            ->update([
            'password'=>Hash::make($request->newPassword)
            ]); 

            return redirect('/')->with('message', 'Password Berhasil diUbah');      
        }
        else{
            return redirect('/')->with('message', 'Password Gagal diUbah');      
        }
     }
    else{
        return redirect('/')->with('message', 'Password Gagal diUbah');      
        }

    }
}
