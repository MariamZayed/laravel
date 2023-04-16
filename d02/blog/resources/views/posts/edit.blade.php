@extends('layouts.app')
@section('title') Create Post @endsection

@section('content')
<form action="{{route('posts.update',$post['id'])}}" method="POST" class="w-50 mt-3 mx-auto">
    @csrf
    @method('PATCH')
    <fieldset>
        <legend><h2>Edit post</h2></legend>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" value="{{$post['title']}} "id="title" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control"  name="description" id="description" rows="3">{{$post['description']}}</textarea>
            </div>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Post Creator</label>
            <select class="form-select form-select" name="user_id" id="user_id">
                {{-- @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach --}}
                <option value="{{ $post['id'] }}">{{ $post['posted_by'] }}</option>

            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </fieldset>
</form>
@endsection