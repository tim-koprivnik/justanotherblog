@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

      <div class="table-responsive">          
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>View Post</th>
                <th>Edit Post</th>
                {{-- <th>View Comments</th> --}}
                {{-- <th>Body</th> --}}
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
                @if($posts)
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td><img height="50" width="100" class="img-rounded" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/300x300'}}" alt=""></td>
                            <td><b>{{$post->title}}</b></td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                            <td><a href="{{route('justanotherblog.post', $post->slug)}}">View Post</a></td>
                            <td><a href="{{route('posts.edit', $post->id)}}">Edit Post</a></td>
                            {{-- <td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td> --}}
                            {{-- <td>{{str_limit($post->body, 7)}}</td> --}}
                            <td>{{$post->created_at ? $post->created_at->diffForHumans() : $post->created_at}}</td>
                            <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : $post->updated_at}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$posts->render()}}
            </div>
        </div>

    </div>

@stop