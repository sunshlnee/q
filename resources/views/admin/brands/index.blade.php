@extends('layouts.app')

@section('content')
    @include('admin.brands._nav')

    <p><a href="{{ route('admin.brands.create') }}" class="btn btn-success">Add Brand</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td><a href="{{ route('admin.brands.show', $brand) }}">{{ $brand->title }}</a></td>
                <td>{{ $brand->slug }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $brands->links() }}
@endsection