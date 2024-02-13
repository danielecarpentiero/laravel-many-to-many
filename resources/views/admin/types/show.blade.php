@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$type->title}}</h1>
        <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Back to types list</a>
        <a class="btn btn-info my-3" href="{{ route('admin.types.edit', $type) }}">Edit this type</a>

    </div>
@endsection
