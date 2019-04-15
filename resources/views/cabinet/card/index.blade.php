@extends('layouts.app')

@section('content')
@include ('cabinet.card._nav')
<table class="table table-striped">
    <thead>
    <tr>
        <th>Артинкул</th>
        <th>Цена</th>
        <th>Категория</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    @foreach ($products as $product)
        <tr>
            <td><a href="{{ route('products.show', $product) }}" target="_blank">{{ $product->code }}</a></td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->title }}</td>
            
        </tr>
    @endforeach

    </tbody>
</table>

@endsection
