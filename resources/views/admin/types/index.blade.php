@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container">
        <h1>Types</h1>
        <ul>
            @foreach ($types as $type)
                <li class="list-unstyled">
                    <a href="{{ route('admin.types.show', $type) }}">
                        <h2 class="mt-3">{{ $type['title'] }}</h2>
                    </a>
                    <form action="{{ route('admin.types.destroy', $type) }}" onsubmit="return confirm('Are you sure you want to delete this record?');" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete this record</button>
                        <a class="btn btn-info" href="{{ route('admin.types.edit', $type) }}">Edit this record</a>
                    </form>
                </li>
            @endforeach
        </ul>
        <a class="btn btn-success mt-3" href="{{ route('admin.types.create') }}">Add a new type</a>
    </div>
@endsection
