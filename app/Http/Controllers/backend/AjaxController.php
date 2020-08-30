<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Posts;
use App\Traits\PostTrait;
use http\Env\Response;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    use PostTrait;

    // index post by ajax
    public function index()
    {
        //$posts = Posts::all();
        //dd($posts);
        return view('frontend.ajax.index',['posts'=>Posts::all()]);
    }

    // create post by ajax
    public function create()
    {
        return view('frontend.ajax.create');
    }

    // store post by ajax
    public function store(Request $request)
    {
        // validate input you have to be required
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'picture' => 'mimes:jpeg,bmp,png,jpg,svg',
        ]);

        // check if the request hase file store the image
        $picture = 'images/posts/default.png';
        if ($request->hasFile('picture')){
            $picture = $this->saveImages($request->picture , 'images/posts' );
        }


        //store the post request data
        $post = Posts::create([
            'title' => $request->get('title'),
            'category' => $request->get('category'),
            'body' => $request->get('body'),
            'picture' => $picture,
        ]);

        // return the response to ajax
        if ($post){
            return response()->json([
                'status' => true,
                'msg' => 'The Post Saved with success'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'msg' => 'Oops Error The Post Not saved ): '
            ]);
        }


    }

    // function to delete post by ajax
    public function delete(Request $request){
        $post = Posts::find($request->id);

        if (!$post){
            return response()->json([
                'status' => false,
                'msg' => 'Oops this id not found ): '
            ]);
        }

        $post->delete();

        return response()->json([
            'status' => true,
            'msg' => 'Yes the Post Deleted with success ):',
            'id' => $request->id
        ]);

    }



    // edit post by ajax
    public function edit(Request $request)
    {

       $post = Posts::find($request->post_id);

        if (!$post){
            return response()->json([
                'status' => false,
                'msg' => 'Oops this id not found ): '
            ]);
        }

        return  view('frontend.ajax.edit', compact('post'));

    }

    // update post
    public function update(Request $request)
    {
        $post = Posts::find($request->post_id);

        if (!$post){
            return response()->json([
                'status' => false,
                'msg' => 'Oops this post not updated ): '
            ]);
        }else{

            if ($request->hasFile('picture')){
                $picture = $this->saveImages($request->picture , 'images/posts' );
                $post->update([
                    'title' => $request->title,
                    'category' => $request->category,
                    'body' => $request->body,
                    'picture' => $picture,
                ]);
            }else{
                $post->update([
                    'title' => $request->title,
                    'category' => $request->category,
                    'body' => $request->body,
                ]);
            }


        }

        return response()->json([
            'status' => true,
            'msg' => 'The Post Updated with success ):'
        ]);
    }

    // show post by ajax
    public function show($id)
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
