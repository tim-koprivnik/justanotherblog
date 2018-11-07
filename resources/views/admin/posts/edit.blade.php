@extends('layouts.admin')

@section('content')

    @include('tiny-editor')

    <h1>Edit Post</h1>
    
    <div class="row">

        <div class="col-sm-3">
            
            <br>
            <img height="300" width="300" class="img-rounded" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/300x300'}}" alt="">

        </div>

        <div class="col-sm-8">

            {{-- UPDATING --}}
            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('user_id', 'Author:') !!}
                {!! Form::select('user_id', [''=>'Choose author'] + $authors, null, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Choose category'] + $categories, null, ['class'=>'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>18]) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-success']) !!}
            </div>

            {!! Form::close() !!}

    
            {{-- DELETING --}}
            {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                </div>

            {!! Form::close() !!}

        </div>
    
    </div>

    <div class="row">

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@stop