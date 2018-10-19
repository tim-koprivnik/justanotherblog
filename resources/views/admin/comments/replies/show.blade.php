@extends('layouts.admin')



@section('content')

    @if(count($replies)>0)

    <h1>Replies</h1>

    <div class="table-responsive">          
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Post</th>
                <th>Reply</th>
                <th>Created</th>
                <th>Approve / Disapprove</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
                @if($replies)
                    @foreach ($replies as $reply)
                        <tr>
                            <td>{{$reply->id}}</td>
                            <td>{{$reply->author}}</td>
                            <td>{{$reply->email}}</td>
                            <td><a href="{{route('justanotherblog.post', $reply->comment->post->slug)}}">View Post</a></td>
                            <td>{{$reply->body}}</td>
                            <td>{{$reply->created_at}}</td>
                            <td>
                                @if($reply->is_active == 1)
                                    {!! Form::model($reply, ['method'=>'PATCH', 'action'=>['CommentsRepliesController@update', $reply->id]]) !!}
                                        <input type="hidden" name="is_active" value="0">
                                        
                                        <div class="form-group">
                                            {!! Form::submit('Dissaprove reply', ['class'=>'btn btn-warning']) !!}
                                        </div>
                                    {!! Form::close() !!}

                                @else
                                    {!! Form::model($reply, ['method'=>'PATCH', 'action'=>['CommentsRepliesController@update', $reply->id]]) !!}
                                        <input type="hidden" name="is_active" value="1">
                                        
                                        <div class="form-group">
                                            {!! Form::submit('Approve reply', ['class'=>'btn btn-success']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                    
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['CommentsRepliesController@destroy', $reply->id]]) !!}
                                        
                                        <div class="form-group">
                                            {!! Form::submit('Delete reply', ['class'=>'btn btn-danger']) !!}
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
    <h1 class="text-center">No replies yet</h1>

    @endif

@stop