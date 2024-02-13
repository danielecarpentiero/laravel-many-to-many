@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">
        <form action="{{route('admin.projects.update', $project)}}" method="POST">
        @csrf
        @method('PATCH')
        <h1 class="text-center">Edit a project</h1>
        <div class="mb-3">
            <label class="form-label">
                <h2>Project title</h2>
            </label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">
                <h3>Project Description</h3>
            </label>
            <textarea class="form-control"  rows="3" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">
                <h2>Type</h2>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option selected>Select a type</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>{{$type->title}}</option>
                    @endforeach
                </select>
            </label>
        </div>
            <div class="mb-3">
                <h4>
                    Technologies used :
                </h4>
                @foreach($technologies as $technology)
            <div class="form-check form-check-inline">
                @if ($errors->any())
                    <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                           id="technologies-{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="technologies-{{$technology->id }}">{{$technology->title }}</label>
                @else
                    <input class="form-check-input" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                           id="technologies-{{ $technology->id }}" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="technologies-{{ $technology->id }}">{{ $technology->title }}</label>
                @endif
            </div>
                @endforeach
            </div>
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{route('admin.projects.show', $project)}}">Go back to single project</a>
            <br>
            <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Go back to projects list</a>
        </div>
    </div>
@endsection
