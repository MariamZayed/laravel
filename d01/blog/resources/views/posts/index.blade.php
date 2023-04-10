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
                    <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('posts.destroy',$post['id'])}}" class="btn btn-primary">destroy</a>
                    <form method="POST" action="{{ route('posts.destroy', $post['id']) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </thead>
    </table>

@endsection