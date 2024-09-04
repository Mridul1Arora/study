@extends('layout.app')

@section('title', 'lead')
@section('content')
    <div class="container">
        <h1>Edit Lead</h1>

        <form action="{{ route('leads.update', $lead->lead_id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('leads.partials.form', ['lead' => $lead])
         
            <input type="hidden" name= "lead_id" value="{{$lead->lead_id}}">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
