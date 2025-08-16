@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Course Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $course->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $course->description }}</p>
            <p class="card-text"><strong>Professor:</strong> {{ $course->professor ? $course->professor->name : 'None Assigned' }}</p>
            <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
