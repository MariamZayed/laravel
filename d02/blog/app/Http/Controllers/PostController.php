<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function  index()
    {
        // $allPosts = Post::with('user')->paginate(15);
        $allPosts = [
            [
                'id'=>1,
                'title'=>"javascript",
                'description'=>' hello js',
                'posted_by'=> 'Mariam',
                'created_at'=> "2023-12-21"
            ],
            [
                'id'=>2,
                'title'=>"php",
                'description'=>' hello php',
                'posted_by'=> 'fatema',
                'created_at'=> "2023-12-21"
            ]
        ];

        return view('posts.index',['posts'=>$allPosts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $users = User::all();
        return view('posts.create'
        // , [ 'users' => $users]
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['user_id'])) {
            Post::create([
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'user_id' => $_POST['user_id']
            ]);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $posts = [
        'id'=>3,
        'title'=>"javascript",
        'description'=>' hello js',
        'posted_by'=> 'Mariam',
        'created_at'=> "2023-12-21"
        ];
        return view('posts.show',['posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
