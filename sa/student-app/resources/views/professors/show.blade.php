@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Professor Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $professor->name }}</h5>
            <a href="{{ route('professors.edit', $professor) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('professors.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
