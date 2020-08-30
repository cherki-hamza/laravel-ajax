<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Posts;
use App\Traits\PostTrait;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    use PostTrait;

    // index post
    public function index()
    {
         //$posts = Posts::all();
         //dd($posts);
         return view('frontend.home.index',['posts'=>Posts::all()]);
    }

    // create post
    public function create()
    {
        return view('frontend.home.create');
    }

    // store post
    public function store(Request $request)
    {
        // validate input you have to be required
        $request->validate([
           'title' => 'required',
           'category' => 'required',
           'body' => 'required',
           'picture' => 'mimes:jpeg,bmp,png,jpg,svg',
        ]);

        // store the image
        $picture = 'images/posts/default.png';
        if ($request->hasFile('picture')){
            $picture = $this->saveImages($request->get('picture') , 'images/posts' );
        }

         //store the post request data
        Posts::create([
           'title' => $request->get('title'),
           'category' => $request->get('category'),
           'body' => $request->get('body'),
           'picture' => $picture,
        ]);


        return redirect()->route('posts.index')->with('success','the post saved with success');

    }

    // show post
    public function show($id)
    {
        //
    }

    // edit post
    public function edit($id)
    {
        //
    }

    // update post
    public function update(Request $request, $id)
    {
        //
    }

    // delete post
    public function destroy($id)
    {
        //
    }
}




// get the photo path and name
//$_get_the_file_name = $request->file('picture')->getClientOriginalName();
//        $file_extension = $request->file('picture')->extension();
//        $file_name = time() . '.' . $file_extension;
//        $path = 'images/posts';
//        $db_path = $path .'/'. $file_name;
//        $request->file('picture')->move($path,$file_name);
