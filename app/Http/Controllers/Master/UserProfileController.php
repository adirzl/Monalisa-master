<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id){
        $data = User::findOrFail($id);
        dd($data);
		$fieldOnForm = User::getFieldOnForm();
		return view('master.userprofile.default', compact('data','fieldOnForm'));
    }
    
}
