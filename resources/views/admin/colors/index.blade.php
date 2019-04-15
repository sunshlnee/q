@extends('layouts.app')

@section('content')
    @include('admin.colors._nav')

    <p><a href="{{ route('admin.colors.create') }}" class="btn btn-success">Add Color</a></p>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($colors as $color)
            <tr>
                <td>{{ $color->id }}</td>
                <td><a href="{{ route('admin.colors.show', $color) }}">{{ $color->title }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $colors->links() }}
@endsection