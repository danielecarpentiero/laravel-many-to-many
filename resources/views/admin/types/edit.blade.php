@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">
        <form action="{{route('admin.types.update', $type)}}" method="POST">
            @csrf
            @method('PATCH')
            <h1 class="text-center">Edit a type</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Type title</h2>
                </label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $type->title) }}">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{route('admin.types.show', $type)}}">Go back to single type</a>
            <br>
            <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Go back to types list</a>
        </div>
    </div>
@endsection
