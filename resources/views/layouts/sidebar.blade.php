
    <!-- SIDEBAR -->
            <div class="col-md-4">

                <!-- Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    {{-- <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div> --}}
                    <div class="input-group">
                        <form method="GET" action="/search" class="form-inline">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </form>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Categories Well -->
                <div class="well">
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @if($categories)
                                    @foreach($categories as $category)
                                        <li><a href="#">{{$category->name}}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget (About me) Well -->
                <div class="well">
                    <h4>About me</h4>
                    <p>Just some random guy from the Earth, located in Milky Way Galaxy, living his little meaningless life, and, in the meantime, messing around with #justanother blog. :)</p>
                </div>

            </div>
            <!-- /.col-md-4 -->