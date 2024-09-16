@extends('layout.app')

@section('title', 'lead')
@section('content')
    <div class="container">
        <h1>Lead Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $lead->first_name }} {{ $lead->last_name }}</h5>
                <p class="card-text"><strong>Lead Source:</strong> {{ $lead->lead_source }}</p>
                <p class="card-text"><strong>Lead Owner:</strong> {{ $lead->lead_owner }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $lead->email }}</p>
                <p class="card-text"><strong>Mobile No.:</strong> {{ $lead->mobile_no }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $lead->address }}</p>
                <p class="card-text"><strong>State:</strong> {{ $lead->state }}</p>
                <p class="card-text"><strong>Lead Status:</strong> {{ $lead->lead_status }}</p>
                <p class="card-text"><strong>Remark:</strong> {{ $lead->remark }}</p>
                <p class="card-text"><strong>Lead Priority:</strong> {{ $lead->lead_priority }}</p>
                <p class="card-text"><strong>Current Stage:</strong> {{ $lead->current_stage }}</p>
            </div>
        </div>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
