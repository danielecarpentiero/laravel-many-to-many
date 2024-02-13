@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container">
        <h1>Technologies</h1>
        <ul>
            @foreach ($technologies as $technology)
                <li class="list-unstyled">
                    <a href="{{ route('admin.technologies.show', $technology) }}">
                        <h2 class="mt-3">{{ $technology['title'] }}</h2>
                    </a>
                    <form action="{{ route('admin.technologies.destroy', $technology) }}" onsubmit="return confirm('Are you sure you want to delete this record?');" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete this record</button>
                        <a class="btn btn-info" href="{{ route('admin.technologies.edit', $technology) }}">Edit this record</a>
                    </form>
                </li>
            @endforeach
        </ul>
        <a class="btn btn-success mt-3" href="{{ route('admin.technologies.create') }}">Add a new technology</a>
    </div>
@endsection
