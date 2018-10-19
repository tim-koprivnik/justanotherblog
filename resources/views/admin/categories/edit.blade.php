@extends('layouts.admin')

@section('content')

    <h1>Edit Category</h1>

    <div class="row">
        {{-- UPDATING --}}
        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['CategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}


        {{-- DELETING --}}
        {!! Form::open(['method'=>'DELETE', 'action'=>['CategoriesController@destroy', $category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
            </div>

        {!! Form::close() !!}
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