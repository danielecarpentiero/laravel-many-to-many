@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">

        <h1 class="text-center">Insert new technology</h1>
        <form action="{{route('admin.technologies.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">
                    <h2>Technology title</h2>
                </label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <button type="submit" class="btn btn-success my-3">Submit</button>
            <div>
                <a class="btn btn-secondary" href="{{ route('admin.technologies.index') }}">Go back to technologies list</a>
            </div>
        </form>
    </div>
@endsection
