@extends('layouts.app')

@section('content')
    @include('admin.fabrics._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.fabrics.edit', $fabric) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('admin.fabrics.destroy', $fabric) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $fabric->id }}</td>
        </tr>
        <tr>
            <th>Title</th><td>{{ $fabric->title }}</td>
        </tr>

    </table>
@endsection