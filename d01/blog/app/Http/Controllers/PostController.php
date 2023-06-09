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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // 1- // $data = request()->all();// request is obj\
        // 2- //$title = request()->title;
        // dd($request->all());
        // dd($request->title);
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
        $post= [
            'id'=>3,
            'title'=>"javascript",
            'description'=>' hello js',
            'posted_by'=> 'Mariam',
            'created_at'=> "2023-12-21"
            ];
        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        return "hello update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        return "hello destroy";

    }
}
