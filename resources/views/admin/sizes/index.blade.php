@extends('layouts.app')

@section('content')
    @include('admin.sizes._nav')

    <p><a href="{{ route('admin.sizes.create') }}" class="btn btn-success">Add Size</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($sizes as $size)
            <tr>
                <td>{{ $size->id }}</td>
                <td><a href="{{ route('admin.sizes.show', $size) }}">{{ $size->title }}</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $sizes->links() }}
@endsection