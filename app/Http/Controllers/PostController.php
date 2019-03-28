<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
      return view('admin.post', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      return view('admin.addPost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      $request->validate([
        'title'=>'required',
        'image'=> 'required',
        'description' => 'required'
      ]);

      $fileImage = $request->file('image');
      $extension = $fileImage->getClientOriginalExtension();
      Storage::disk('public')->put($fileImage->getFilename().'.'.$extension,  File::get($fileImage));
      
      $post = new Post([
        'title' => $request->get('title'),
        'description'=> $request->get('description'),
        'price'=> $request->get('price'),
        'filename' => $fileImage->getFilename().'.'.$extension,
        'mime' => $fileImage->getClientMimeType(),
        'original_filename' => $fileImage->getClientOriginalName(),
        'user_id' => Auth::id()
      ]);
      $post->save();
      $categories = array();
      if($request->get('category_blog') != null){
        array_push($categories, $request->get('category_blog') );
      }
      if($request->get('category_recommend') != null){
        array_push($categories, $request->get('category_recommend') );
      }
      if($request->get('category_umrah') != null){
        array_push($categories, $request->get('category_umrah') );
      }
      if($request->get('category_haji') != null){
        array_push($categories, $request->get('category_haji') );
      }
      if(count($categories) > 0){
        $category = Category::find($categories);
        $post->categories()->attach($category);
      }
      
      return redirect('/post')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $model = Post::find($id);
      return view('show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      $categories = Category::all();
      return view('admin.editPost', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title'=>'required',
        'image' =>'required',
        'description' => 'required'
      ]);

      $fileImage = $request->file('image');
      $extension = $fileImage->getClientOriginalExtension();
      Storage::disk('public')->put($fileImage->getFilename().'.'.$extension,  File::get($fileImage));

      $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->price = $request->get('price');
        $post->filename = $fileImage->getFilename().'.'.$extension;
        $post->mime = $fileImage->getClientMimeType();
        $post->original_filename = $fileImage->getClientOriginalName();
        $post->user_id = Auth::id();
      
      $post->save();
      $detachcategory = Category::find([1,2,3,4]);
      $post->categories()->detach($detachcategory);

      $categories = array();
      if($request->get('category_blog') != null){
        array_push($categories, $request->get('category_blog') );
      }
      if($request->get('category_recommend') != null){
        array_push($categories, $request->get('category_recommend') );
      }
      if($request->get('category_umrah') != null){
        array_push($categories, $request->get('category_umrah') );
      }
      if($request->get('category_haji') != null){
        array_push($categories, $request->get('category_haji') );
      }
      if(count($categories) > 0){
        $category = Category::find($categories);
        $post->categories()->attach($category);
      }
      return redirect('/post')->with('success', 'Stock has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
 
      return redirect('/post')->with('success', 'Post has been deleted Successfully');
    }
}
