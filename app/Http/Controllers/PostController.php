<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $post= Post::all();
        return response()->json([
            'message'=>'Post Created',
            'status'=>'success',
            'data'=>$post,
        ]);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'title'=>'required',
            'description'=>'required',

        ]);
        $post= Post::create($data);
        return response()->json([
            'message'=>'Post Created',
            'status'=>'success',
            'data'=>$post,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {

        $post= Post::find($id);
        return response()->json([
            'message'=>'Post Created',
            'status'=>true,
            'data'=>$post,
        ]);
    

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {  

        $data =$request->validate([
            'title'=>'required',
            'description'=>'required',

        ]);
        $post= Post::find($id);
        if($post){
        $post->update($data);
        return response()->json([
            'message'=>'Post Created',
            'status'=>true,
            'data'=>$post,
        ]);
        } else{
            return response()->json([
                'message'=>'Post not Created',
                'status'=>false,
                'data'=>null,
            ],404);

        }
    
    }
    public function delete(Request $request,$id)
    {  

        $post= Post::find($id);
        if($post){
        $post->delete();
        return response()->json([
            'message'=>'Post deleted',
            'status'=>true,
            'data'=>null,
        ]);
        } else{
            return response()->json([
                'message'=>'Post not Created',
                'status'=>false,
                'data'=>null,
            ],404);

        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
