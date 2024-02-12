@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Project number {{$project->id}}: {{$project->title}}</h1>
        <p>{{$project->description}}</p>
        <h3>Type: {{$project->type?->title}}</h3>
        <br>
        <h4>Technologies used: </h4>
        <div class="technology-list">
            <ul>
                @foreach($project->technologies as $technology)
                    <li>
                        {{$technology->title}}
                    </li>
                @endforeach
            </ul>
        </div>
        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Back to projects list</a>
        <a class="btn btn-info my-3" href="{{ route('admin.projects.edit', $project) }}">Edit this project</a>

    </div>
@endsection
