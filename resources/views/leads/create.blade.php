@extends('layout.app')

@section('title', 'lead')
@section('content')
    <div class="container">
        <h1>Create Lead</h1>
        <form action="{{ route('leads.store') }}" method="POST">
            @csrf
            @include('leads.partials.form')
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
