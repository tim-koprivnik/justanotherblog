@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    {{-- <div class="col-sm-6"> --}}
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
                @if($categories)
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
                            <td>{{$category->updated_at ? $category->created_at->diffForHumans() : 'No date'}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    {{-- <div> --}}

    {{-- <div class="col-sm-6">


    <div> --}}

@stop