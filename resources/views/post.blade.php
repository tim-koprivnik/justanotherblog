@extends('layouts.blog-post')

@section('blog-post-content')

        <!-- Post -->

                <!-- Title of post -->
                <p class="h1">{{$post->title}}</p>

                <!-- Author of post -->
                <p class="lead">
                    by <i>{{$post->user->name}}</i>
                </p>

                <hr>

                <!-- Date/time of post -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at ? $post->created_at->diffForHumans() : $post->created_at}}</p>

                <!-- Image of post -->
                <img class="img-responsive img-rounded" 
                src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">

                <br>

                <!-- Body of post -->
                {{-- <p class="text-justify font-weight-light">{{$post->body}}</p> --}}
                <p class="text-justify font-weight-light">{!! $post->body !!}</p> <!--that way TinyMCE works -->

                <hr>

                <!-- Disqus Commenting System -->
                <div id="disqus_thread"></div>
                        <script>(function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://http-justanotherblog-test-home.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();</script>

                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                
                        <script id="dsq-count-scr" src="//http-justanotherblog-test-home.disqus.com/count.js" async></script>               


                <!-- Old Commenting System -->
                {{-- @section('scripts')
                <script>$(".comment-reply-container .toggle-reply").click(function() {
                        $(this).next().slideToggle("slow");
                });</script> --}}
@stop
