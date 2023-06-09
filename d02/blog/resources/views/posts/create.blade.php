@extends('layouts.app')
@section('title') Create Post @endsection

@section('content')
<form action="{{route('posts.store')}}" method="POST" class="w-50 mt-3 mx-auto">
    @csrf
    <fieldset>
        <legend><h2>Create new post</h2></legend>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
        </div>
        <div class="mb-3">
            <label  class="form-label">Post Creator</label>
            <select class="form-control" name="posted_by">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </fieldset>
</form>
@endsection