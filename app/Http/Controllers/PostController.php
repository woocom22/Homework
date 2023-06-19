<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Post::all();
        return view('admin.post.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $models = Category::where('status','active')->get();
        return view('admin.post.create',compact('models'));

    }

    /**
     * Store a newly created resource in storage.
     *

     *
     */



    public function store(Request $request)
    {
        // dd($request->all());

       $request->validate([
            'title' => ['required','unique:posts'],
            'category_id' => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
            'photo' => ['required'],
            'status' => ['required'],
        ]);

        $model = new Post;
        $model->title = $request->title;
        $model->category_id = $request->category_id;
        $model->short_description = $request->short_description;
        $model->description = $request->description;
        $model->photo = $request->photo;
        $model->status = $request->status;
        $model->slug = Str::slug($request->title);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file->extension() ? : 'png';
            $photo = Str::random(10) . '.' . $ext;

            // Resize image

            $path = public_path().'/uploads/post/';
            $resize = Image::make($file->getRealPath());
            $resize->resize(900,570);
            $resize->save($path.'/'.$photo);
            $model->photo = $photo;

        }
        $model->save();

        return redirect()->route('posts.index')->with('message','Post Insert Successfully');

    }


    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $model = Post::findOrFail($id);
        $models = Category::where('status','Active')->get();
        return view('admin.post.edit',compact('models','model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {

    $model = $post;
    $model->title = $request->title;
    $model->category_id = $request->category_id;
    $model->short_description = $request->short_description;
    $model->description = $request->description;
    $model->status = $request->status;
    $model->slug = Str::slug($request->title);

    if($request->hasFile('photo')){
        $file = $request->file('photo');
        $ext = $file->extension() ? : 'png';
        $photo = Str::random(10) . '.' . $ext;

        // Resize image

        $path = public_path().'/uploads/post/';
        $resize = Image::make($file->getRealPath());
        $resize->resize(900,570);

        // Old Photo delete
        if($request->old_photo){
            $path1 = public_path().'/uploads/post/'.$request->old_photo;
            unlink($path1);
        }

        $resize->save($path.'/'.$photo);
        $model->photo = $photo;

    }
    $model->save();

    return redirect()->route('posts.index')->with('message','Post Insert Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }

    public function delete($id)
    {
        $model = Post::findOrFail($id);
        if($model->photo){
            $asdsdf = public_path(). '/uploads/post/'.$model->photo;
            unlink($asdsdf);
        }
        $model->delete();
        return redirect()->route('posts.index')->with('message','Post Delete Successfully');

    }


}
