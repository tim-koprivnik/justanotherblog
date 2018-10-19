@extends('layouts.blog-home')

@section('blog-home-content')

            <!-- Page Header -->
            <div class="col-md-8">

                <h1 class="page-header">
                    #justanotherblog
                    <small>by whoknowswho</small>
                </h1>

                <!-- Posts -->
                @foreach($posts as $post)
                    <h2>
                        <a href="{{route('justanotherblog.post', $post->slug)}}">{{$post->title}}</a>
                    </h2>
                    <p class="lead">
                        by <i>{{$post->user->name}}</i>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at ? $post->created_at->diffForHumans() : $post->created_at}}</p>
                    <hr>
                    <img class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">
                    <hr>
                    {{-- <p class="text-justify font-weight-light">{{str_limit($post->body, 450)}}</p> --}}
                    <p class="text-justify font-weight-light">{!! str_limit($post->body, 450) !!}</p>
                        <!--that way TinyMCE works -->
                    <a class="btn btn-primary" href="{{route('justanotherblog.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                @endforeach

                <!-- Pagination -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$posts->render()}}
                    </div>
                </div>

            </div>
            {{-- /.col-md-8" --}}
                
    

@endsection
