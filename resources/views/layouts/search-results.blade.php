    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <style>
        body {
            background-image: url('/public/images/background.jpg');
        }
    </style>

@extends('layouts.header')
    
    <div class="container">
        <div class="row">
            
            <h1>Posts</h1>  

            @if(count($results) > 0)
            {{-- @if($results == $results->title) --}}
                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Created</th>
                                    <th>View Post</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td><img height="50" width="100" class="img-rounded" src="{{$result->photo ? $result->photo->file : 'http://placehold.it/300x300'}}" alt=""></td>
                                    <td>{{$result->title}}</td> 
                                    <td>{{$result->created_at ? $result->created_at->diffForHumans() : $result->created_at}}</td>
                                    <td><a href="{{route('justanotherblog.post', $result->slug)}}">View Post</a></td>
                                </tr>
                            @endforeach
                            </tbody>    
                        </table>
                    </div>
            @else
                <h3>No results</h3>
            @endif

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->


    <!-- js -->
    <script src="{{asset('js/libs.js')}}"></script>
