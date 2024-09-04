<!-- resources/views/leads/index.blade.php -->
@extends('layout.app')

@section('title', 'lead')
@section('content')
    <div class="container">
        <h1>Leads</h1>
        @can('create lead')
            <a href="{{ route('leads.create') }}" class="btn btn-primary mb-3">Add New Lead</a>
        @endcan

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lead Source</th>
                    <th>Lead Owner</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    @can('view email field')
                        <th>Email</th>
                    @endcan    
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{ $lead->lead_id }}</td>
                        <td>{{ $lead->lead_source }}</td>
                        <td>{{ $lead->lead_owner }}</td>
                        <td>{{ $lead->first_name }}</td>
                        <td>{{ $lead->last_name }}</td>
                        @can('view email field')
                            <td>{{ $lead->email }}</td>
                        @endcan
                        <td>{{ $lead->lead_status }}</td>
                        <td>{{ $lead->lead_priority }}</td>
                        <td>
                            @can('view lead')
                                <a href="{{ route('leads.show', ['lead_id' => $lead->lead_id]) }}" class="btn btn-info btn-sm">View</a>
                            @endcan

                            @can('edit lead')
                                <a href="{{ route('leads.edit', ['lead_id' => $lead->lead_id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endcan

                            @can('delete lead')
                                <a href="{{ route('leads.destroy', ['lead_id' => $lead->lead_id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            @endcan    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
