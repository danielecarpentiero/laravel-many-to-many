@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">

    <h1 class="text-center">Insert new project</h1>
    <form action="{{route('admin.projects.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">
            <h2>Project title</h2>
        </label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label class="form-label">
            <h2>Project description</h2>
        </label>
        <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">
            <h2>Type</h2>
            <select class="form-select" name="type_id" aria-label="Default select example">
                <option selected>Select a type</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" @if (old('type_id') == $type->id) selected
                @endif>{{$type['title']}}</option>
                @endforeach
              </select>
        </label>
    </div>
        <div class="mb-3">
        @foreach($technologies as $technology)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="{{$technology['id']}}" name="technologies[]" id="technology-{{$technology['id']}}" {{in_array($technology['id'], old('technologies', [])) ? 'checked' : '' }} >
            <label class="form-check-label" for="technology-{{$technology['id']}}">{{$technology['title']}}</label>
        </div>
        @endforeach
        </div>
    <button type="submit" class="btn btn-success my-3">Submit</button>
    <div>
        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Go back to projects list</a>
    </div>
    </form>
    </div>
@endsection
