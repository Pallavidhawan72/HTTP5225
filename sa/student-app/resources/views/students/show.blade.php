@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Student Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
            <p class="card-text"><strong>Courses:</strong>
                @if($student->courses->count())
                    <ul>
                        @foreach($student->courses as $course)
                            <li>{{ $course->name }}</li>
                        @endforeach
                    </ul>
                @else
                    None
                @endif
            </p>
            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
