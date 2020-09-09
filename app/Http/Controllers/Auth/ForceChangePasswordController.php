<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForceChangePasswordController extends Controller
{
    public function index(){
        return view('auth.changepassword');
    }

    public function changepassword(ChangePassword $request){
        $user = User::findOrFail(auth()->user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
            //  'password' => Hash::make('tantansuryana'),
            'password' => $request->new_password,
            'force_change_password' => false
             ])->save();

            $request->session()->flash('success', 'Password changed');
            return redirect()->route('home');

         } else {
             $request->session()->flash('error', 'Password does not match');
             return redirect()->route('login');
         }
    }
}
