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
                @if($post->user)
                    <td>{{$post->user->name}}</td>
                @else
                    <td>not found</td>
                @endif
                <td>{{$post['description']}}</td>
                <td>{{ \Carbon\Carbon::parse($post['created_at'])->format('j F, Y') }}</td>
                <td>
                    <a href="{{route('posts.show',$post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
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
    {{ $posts->links() }}
@endsection

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('form').click(function(event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection