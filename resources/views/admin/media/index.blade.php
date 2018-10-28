@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
            @if($photos)

                {{-- {!! Form::open(['method'=>'DELETE', ['action'=>'MediaController@destroy', $photo->id], 'class'=>'form-inline']) !!} --}}
                <form action="{{url('admin/delete/media')}}" method="post" class="form-inline">
                {{csrf_field()}}
                {{method_field("post")}}

                    <div class="form-group">
                        <select name="checkBoxArray" id="" class="form-control">
                            <option value="">Delete</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="delete_selected" value="Delete Selected Files" class="btn btn-danger">
                    </div>

                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="options"> Select all</th>
                                <th>ID</th>
                                <th>File</th>
                                <th>Created</th>
                                {{-- <th>Updated</th> --}}
                                {{-- <th>Delete</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $photo)
                                    <tr>
                                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></th>
                                        <td>{{$photo->id}}</td>
                                        <td><img height="100" width="120" class="img-rounded" src="{{$photo ? $photo->file : 'No photo'}}" alt=""></td>
                                        <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : $photo->created_at}}</td>
                                        {{-- <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'No date'}}</td> --}}
                                        <td><input type="hidden" name="photo" value="{{$photo->id}}"></td>
                                            {{-- <div class="form-group">
                                                <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                                            </div> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </form>
                {{-- {!! Form::close() !!} --}}

            @endif

@stop


<!--For selecting boxes -->
@section('scripts')

<script>
    $(document).ready(function() {
            $('#options').click(function() {
                
                if(this.checked) {
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });

                } else {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }
            });
        });
</script>

@stop

