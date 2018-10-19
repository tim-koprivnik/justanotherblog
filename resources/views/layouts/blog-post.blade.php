<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>#justanotherblog</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    <!-- HEADER -->
    @include('layouts.header')


    <!-- PAGE CONTENT (Specific Post) -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                 {{-- yields section 'blog-post-content' from "post.blade.php" --}}
                @yield('blog-post-content')

            </div>
            <!-- /.col-lg-8 -->

            <!-- SIDEBAR -->
            @include('layouts.sidebar')

        
        </div>
        <!-- /.row -->

        <hr>


    <!-- FOOTER -->
    @include('layouts.footer')


        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->



    <!-- jQuery -->
    {{-- <script src="js/jquery.js"></script> --}}

    <!-- jQuery -->
    <script src="{{asset('js/libs.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    @yield('scripts')

    
</body>

</html>
