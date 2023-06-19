<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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


    public function about(){
        return view('frontend.about');
    }

    public function index(){
        return view('frontend.index');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function singlePost(){
        return view('frontend.single-post');
    }

    public function single_post($slug){
        $sPost = Post::where('slug', $slug)->first();
        return view('frontend.single-post', compact('sPost'));
    }

    public function categories($slug){
        $category = Category::where('slug', $slug)->first();
        $cPost = Post::where('category_id', $category->id)->latest()->take(5)->get();
        return view('frontend.category-post', compact('category', 'cPost'));
    }



}
