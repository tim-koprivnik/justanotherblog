@extends('layouts.admin')

@section('content')

    {{-- getting message if user has been deleted --}}
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{Session('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <div class="table-responsive">          
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
                @if($users)
                {{-- "$users" refers to variable "$users" in "UsersController@index" (line 16) --}}
                    @foreach ($users as $user) 
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><img height="50" width="50" class="img-rounded" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/300x300'}}" alt=""></td>
                            <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role ? $user->role->name : 'No role'}}</td>
                            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                            <td>{{$user->created_at ? $user->created_at->diffForHumans() : $user->created_at}}</td>
                            <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : $user->updated_at}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>


@stop