@extends('layouts.admin')



@section('content')

    @if(count($comments)>0)

    <h1>Comments</h1>

    <div class="table-responsive">          
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>View Post</th>
                <th>Comment</th>
                <th>View Replies</th>
                <th>Created</th>
                <th>Approve / Disapprove</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @if($comments)
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->author}}</td>
                            <td>{{$comment->email}}</td>
                            <td><a href="{{route('justanotherblog.post', $comment->post->slug)}}">{{$comment->post->title}}</a></td>
                            <td>{{$comment->body}}</td>
                            <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>
                            <td>{{$comment->created_at}}</td>
                            <td>
                                @if($comment->is_active == 1)
                                    {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['CommentsController@update', $comment->id]]) !!}
                                        <input type="hidden" name="is_active" value="0">
                                        
                                        <div class="form-group">
                                            {!! Form::submit('Dissaprove comment', ['class'=>'btn btn-warning']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::model($comment, ['method'=>'PATCH', 'action'=>['CommentsController@update', $comment->id]]) !!}
                                        <input type="hidden" name="is_active" value="1">
                                        
                                        <div class="form-group">
                                            {!! Form::submit('Approve comment', ['class'=>'btn btn-success']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['CommentsController@destroy', $comment->id]]) !!}
                                        
                                        <div class="form-group">
                                            {!! Form::submit('Delete comment', ['class'=>'btn btn-danger']) !!}
                                        </div>
                                    {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    @else
    <h1 class="text-center">No comments yet</h1>

    @endif

@stop