<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        if(Auth::user()){
            if(Auth::user()->user_type == 'user'){
                return view('dashboard');
            }elseif(Auth::user()->user_type == 'admin'){
                return view('admin.dashboard');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login');
        }

    }

    public function admin(){
        return view('admin.dashboard');
    }


}
