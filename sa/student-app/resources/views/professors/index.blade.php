@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Professors</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Assigned Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->name }}</td>
                    <td>
                        {{ $professor->course ? $professor->course->name : 'None' }}
                    </td>
                    <td>
                        <a href="{{ route('professors.edit', $professor) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('professors.destroy', $professor) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
