<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile')->with(['user' => User::find(auth()->user()->id)]);
    }

    public function edit(User $user)
    {
        $old_user = User::find(auth()->user()->id);

        return view('edit')->with(['user' => $user, 'old_user' => $old_user]);
    }

    public function update(UserRequest $request)
    {
        $input_user = $request['user'];
        $user = User::find(auth()->user()->id);
        $user->fill($input_user)->save();

        return redirect('/mypage');
    }
}
