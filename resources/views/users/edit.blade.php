@extends('layout.app')

@section('content')
    <h1>Edit Roles for {{ $user->name }}</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div>
            @foreach ($roles as $role)
                <label>
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                           {{ $user->roles->contains($role) ? 'checked' : '' }}>
                    {{ $role->name }}
                </label>
            @endforeach
        </div>
        <button type="submit">Update Roles</button>
    </form>
@endsection
