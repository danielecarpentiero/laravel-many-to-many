@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$technology->title}}</h1>
        <a class="btn btn-secondary" href="{{ route('admin.technologies.index') }}">Back to technologies list</a>
        <a class="btn btn-info my-3" href="{{ route('admin.technologies.edit', $technology) }}">Edit this technology</a>

    </div>
@endsection
