@extends('layouts.admin')

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
        <textarea class="form-control"  rows="3" name="description" value="{{old('description')}}"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">
            <h2>Type</h2>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select a type</option>
                @foreach ($types as $type)
                <option value="{{$type['id']}}" @if (old('type_id') == $type->id) selected
                @endif>{{$type['title']}}</option>
                @endforeach
              </select>
        </label>
    </div>
    <button type="submit" class="btn btn-success my-3">Submit</button>
    <div>
        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Go back to projects list</a>
    </div>
    </form>
    </div>
@endsection
