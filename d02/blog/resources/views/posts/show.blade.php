@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <h1>Post Details </h1>
    <br/>
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$posts['title']}}</h5>
            <p class="card-text">Description: {{$posts['description']}}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            {{-- <h5 class="card-title">{{$post['user']['name']}}</h5> --}}
        </div>
    </div>

@endsection