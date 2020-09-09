<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        foreach (\Illuminate\Support\Facades\Route::getRoutes() as $route) {
            dd($route);
        }
        dd('landing');
    }
    //
}
