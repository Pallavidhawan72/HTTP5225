@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Course</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $course->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="professor_id" class="form-label">Professor</label>
            <select name="professor_id" id="professor_id" class="form-select">
                <option value="">-- None --</option>
                @foreach($professors as $professor)
                    <option value="{{ $professor->id }}" {{ old('professor_id', $course->professor_id) == $professor->id ? 'selected' : '' }}>{{ $professor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
