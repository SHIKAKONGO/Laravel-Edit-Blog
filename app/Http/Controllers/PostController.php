<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BlogPost;

use App\Http\Requests\StorePost;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('post.index' , ['posts' => BlogPost::withCount('comments')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request) {

        $validatedData = $request->validated();
        
        $blogPost = BlogPost::create($validatedData);

        $request->session()->flash('status' , 'Blog was Created!');

        return redirect()->route('post.show' , ['post' => $blogPost->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.show' , ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {

        $post = BlogPost::findOrFail($id);
        return view('post.edit' , ['post' => $post]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validatedData = $request->validated();

        $post->fill($validatedData);

        $post->save();

        $request->session()->flash('status' , 'Blog post was updated');

        return redirect()->route('post.show' , ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $post = BlogPost::findOrFail($id);
        
        $post->delete();

        $request->session()->flash('status' , 'Blog post was deleted');

        return redirect()->route('post.index');
    }
}
