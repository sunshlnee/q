@extends('layouts.app')

@section('content')
    @include('admin.fabrics._nav')

    <p><a href="{{ route('admin.fabrics.create') }}" class="btn btn-success">Add Fabric</a></p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($fabrics as $fabric)
            <tr>
                <td>{{ $fabric->id }}</td>
                <td><a href="{{ route('admin.fabrics.show', $fabric) }}">{{ $fabric->title }}</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $fabrics->links() }}
@endsection