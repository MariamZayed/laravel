<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPosts = Post::with('user')->paginate(15);
        return view('posts.index',['posts'=>$allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        return view('posts.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        Post::create($request->all());
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {     
        // eloquent orm     
        // $post = POST::find($id);//limit =1
        // $post = POST::where('id',$id)->first();//limit 1= bring me first result
        // $post = POST::where("id",$id)->all();//bring me all where title = test
        $post = POST::where("id",$id)->with('user')->first();
        return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $post = Post::where("id",$id)->first();
        $users = User::select('id', 'name')->get();
        return view('posts.edit',compact('post','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {   
        $post = Post::where('id', $id)->first();
        $post->update($request->all());
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Post::where('id', $id)->first()->delete();
        return to_route('posts.index');
    }

    public function storeComment(Request $request, int $id)
    {   
        $post = Post::where('id', $id)->first();
        $post->comments()->create($request->all());
        return redirect()->back();
    }

    public function deleteComment(Request $request, int $commentID)
    {   
        // $post = Post::where('id', $id)->first();
        // $post->comments()->delete();
        Comment::where('id', $commentID)->delete();
        return redirect()->back();
    }

    public function updateComment(Request $request, int $commentID)
    {   
        // $post = Post::where('id', $commentID)->first();
        // $post->comments()->update([
        //     'body' => $request->body,
        // ]);
        Comment::where('id', $commentID)->update([
            'body' => $request->body,
        ]);
        return redirect()->back();
    }
}
