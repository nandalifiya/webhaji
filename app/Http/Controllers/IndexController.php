<?php

namespace App\Http\Controllers;

use DummyFullModelClass;
use Illuminate\Http\Request;
use App\lain;
use App\Post;
use App\Category;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function index(lain $lain)
    {
        $posts = Post::all();
        $hajiPosts = Post::whereHas('categories', function($q){
                    $q->where('name', 'haji');
                })->get();
        $UmrohPosts = Post::whereHas('categories', function($q){
                    $q->where('name', 'umroh');
                })->get();
        $recommendPosts = Post::whereHas('categories', function($q){
                    $q->where('name', 'recommend');
                })->get();
        $blogPosts = Post::whereHas('categories', function($q){
                    $q->where('name', 'blog');
                })->get();

        return view('index', [
                'posts' => $posts, 
                'hajiPosts'=> $hajiPosts,
                'umrohPosts' => $UmrohPosts,
                'recommendPosts' => $recommendPosts,
                'blogPosts' => $blogPosts
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(lain $lain)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lain  $lain
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, lain $lain)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show(lain $lain, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit(lain $lain, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lain $lain, DummyModelClass $DummyModelVariable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy(lain $lain, DummyModelClass $DummyModelVariable)
    {
        //
    }
}
