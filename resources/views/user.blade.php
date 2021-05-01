@extends('layout.app')

@section('content')

<table class="table table-striped table-bordered" style="margin-top: 70px;">
            <thead>
                
                <tr class="text-center">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Roles</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            
            @foreach($user as $users)
            <tr class="text-center">

                <td>{{ $users->id }}</td>
                <td>{{ $users->first_name }}</td>
                <td>{{ $users->last_name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->contact_no }}</td>
                <td>{{ $users->roles }}</td>
                <td><a href="{{ route('deleteuser',['id'=>$users->id]) }}"><i class="material-icons" style="margin-left: 30px; font-size: 25px; padding: 3px;">&#xE872;</i></a></td>

                <td><a href="{{ route('editu',['id'=>$users->id]) }}"><i class="material-icons" style="font-size: 25px;padding: 3px;">&#xE254;</i></a></td>

            </tr>
            @endforeach
        </table>

        <div class="d-flex justify-content-center">
                {!! $user->links() !!}
        </div>

@endsection