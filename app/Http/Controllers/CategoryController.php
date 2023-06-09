<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function create(){
        return view('admin.Category.create');
    }
    public function store(Request $request){
        $model = new category;
        $model->name = $request->name;
        $model->status = $request->status;
        $model->slug = Str::slug($request->name);
        $model->save();

        return redirect()->route('category.index')->with('message', 'Category Insert Successfully');
    }
     public function update(Request $request){
        $model = category::findOrFail($request->id);
        $model->name = $request->name;
        $model->status = $request->status;
        $model->slug = Str::slug($request->name);
        $model->save();

        return redirect()->route('category.index')->with('message', 'Category Insert Successfully');
    }
    public function delete($id){
        $model = category::findOrFail($id);
        $model->delete();

        return redirect()->route('category.index')->with('message', 'Category Insert Successfully');
    }
    public function edit($id){
        $model = category::findOrFail($id);
        return view('admin.Category.edit', compact('model'));
    }
    public function index(){
        $models = Category::all();
        return view('admin.Category.index', compact('models'));
    }

}
