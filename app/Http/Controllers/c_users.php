<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class c_users extends Controller
{
    public function add(Request $request)
    {
        $Users = new Users;
 
        $Users->username = $request->username;
        $Users->email = $request->email;
        $Users->phone = $request->phone;
        $Users->password = $request->password;
        $Users->foto='no-image.png';

        return $Users->save();
    }

    public function update(Request $request)
    {
        $id_user  = $request->input('id_user');
        $Users = Users::find($id_user);
 
        $Users->username = $request->username;
        $Users->email = $request->email;
        $Users->password = $request->password;
        $Users->phone = $request->phone;
        
        return $Users->save();
    }

    public function delete(Request $request)
    {
        $id_user  = $request->input('id_user');

        $Users = Users::find($id_user);

        return $Users->delete();
    }

    public function search(Request $request){
        $username=$request->input('username');
        
        return Users::where('username', $username)
             ->orWhere('username', 'like', '%' .$username . '%')->get();
    }

    public function upload(Request $request){
       $id_user = $request->input("_data");
       $foto =  $request->file('file')->store('public');

       $Users = Users::find($id_user);

       $foto =  str_replace("public/","",$foto);
       $Users->foto = $foto;
       

       return $Users->save();
    }
}
