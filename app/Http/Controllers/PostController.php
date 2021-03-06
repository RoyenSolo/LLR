<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(7);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
          'title' => 'required|max:191',
          'slug'  => 'required|alpha_dash|min:5|max:190|unique:posts,slug',
          'category_id' => 'required|integer',
          'body'  => 'required'
        ]);

        //insert into the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();

        $post->tags()->sync($request->tags, false);

        //set flasch success message
        Session::flash('success', 'The post was successfuly saved!');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show')->with('post', $post);
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
      $cats = [];
      foreach ($categories as $category) {
        $cats[$category->id] = $category->name;
      }
      $tags = Tag::all();
      $tags2 = [];
      foreach ($tags as $tag) {
        $tags2[$tag->id] = $tag->name;
      }
      return view('posts.edit')->with('post', $post)->with('categories', $cats)->with('tags', $tags2);
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
      $post = Post::find($id);

      if ($request->slug == $post->slug) {
        $this->validate($request, [
          'title' => 'required|max:191',
          'category_id' => 'required|integer',
          'body'  => 'required'
        ]);
      }
      else {
        $this->validate($request, [
          'title' => 'required|max:191',
          'slug'  => 'required|alpha_dash|min:5|max:190|unique:posts,slug',
          'category_id' => 'required|integer',
          'body'  => 'required'
        ]);
      }

      $post->title = $request->input('title');
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = $request->body;

      $post->save();

      $post->tags()->sync($request->tags);

      Session::flash('This post was successfully saved!');

      return redirect()->route('posts.show', $post->id);
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
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'The post was successfully deleted!');

        return redirect()->route('posts.index');
    }
}
