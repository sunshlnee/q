@extends('layouts.app')

@section('content')
    @include('admin.brands._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.brands.destroy', $brand) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $brand->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $brand->title }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $brand->slug }}</td>
        </tr>
        </tbody>
    </table>
@endsection