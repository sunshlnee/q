@extends('layouts.app')

@section('content')
    @include('admin.sizes._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.sizes.edit', $size) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.sizes.destroy', $size) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $size->id }}</td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $size->title }}</td>
        </tr>

    </table>
@endsection