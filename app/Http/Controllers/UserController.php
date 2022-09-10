<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function profile(User $user){
        return view('profile')->with(['user'=>$user->first()]);;
    }
    public function edit(User $user){
        return view('edit')->with(['user'=>$user]);
    }
    public function update(Request $request, User $user)
    {
        
        $input_user = $request['user'];
        $user->fill($input_user)->save();

 
        return redirect('/mypage' . $user->shoukaibun);
    }
}
