@extends('layout.app')

@section('content')
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>
                        @foreach($per as $role)
                            {{ $role->name }} 
                        @endforeach
                    </td>
                    <td>
                        @can('view users') 
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
