@extends('layouts.app')
@section('title')  Index  @endsection {{--laravel 10--}}

@section('content')

    <div class="text-center">
        <a href="{{route('posts.create')}}"  class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['description']}}</td>
                {{-- <td>{{$posts[user][name]}}</td> --}}
                <td>{{ \Carbon\Carbon::parse($post['created_at'])->format('j F, Y') }}</td>
                <td>
                    <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </thead>
    </table>

@endsection