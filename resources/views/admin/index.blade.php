@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>My projects</h1>
    <ul>
        @foreach ($projects as $project)
        <li class="list-unstyled">
            <a href="{{ route('admin.projects.show', $project) }}">
                <h2 class="mt-3">{{ $project['title'] }}</h2>
            </a>
            <form action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Are you sure you want to delete this record?');" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete this record</button>
                <a class="btn btn-info" href="{{ route('admin.projects.edit', $project) }}">Edit this record</a>
            </form>
        </li>
        @endforeach
    </ul>
    <a class="btn btn-success mt-3" href="{{ route('admin.projects.create') }}">Add a new project</a>
</div>
@endsection
