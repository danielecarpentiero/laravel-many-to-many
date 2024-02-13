@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">

        <h1 class="text-center">Insert new type</h1>
        <form action="{{route('admin.types.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">
                    <h2>Type title</h2>
                </label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <button type="submit" class="btn btn-success my-3">Submit</button>
            <div>
                <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Go back to types list</a>
            </div>
        </form>
    </div>
@endsection
