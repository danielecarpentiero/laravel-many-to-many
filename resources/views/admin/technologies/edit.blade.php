@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">
        <form action="{{route('admin.technologies.update', $technology)}}" method="POST">
            @csrf
            @method('PATCH')
            <h1 class="text-center">Edit a technology</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Technology title</h2>
                </label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $technology->title) }}">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{route('admin.technologies.show', $technology)}}">Go back to single technology</a>
            <br>
            <a class="btn btn-secondary" href="{{ route('admin.technologies.index') }}">Go back to technologies list</a>
        </div>
    </div>
@endsection
