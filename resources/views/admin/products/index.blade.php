@extends('layouts.app')

@section('content')
    @include('admin.products._nav')

    <p><a href="{{ route('admin.products.create') }}" class="btn btn-success">Add Product</a></p>

    <div class="card mb-3">
        <div class="card-header">Filter</div>
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="code" class="col-form-label">Code</label>
                            <input id="code" class="form-control" name="code" value="{{ request('code') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price</label>
                            <input id="price" class="form-control" name="price" value="{{ request('price') }}">
                        </div>
                    </div>
                   
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Price</th>
            <th>Category</th>
            <th>Brand</th>
            <th>MainPhoto</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>    
                <td>{{ $product->id }}</td>
                <td><a href="{{ route('admin.products.show', $product) }}">{{ $product->code }}</a></td>
                <td>{{ $product->price }}</td>
                <td><a href="{{ route('admin.categories.show', $product->category) }}">{{ $product->category->title }}</a></td>
                <td><a href="{{ route('admin.brands.show', $product->brand ?? '') }}">{{ $product->brand->title ?? 'Без бренда' }}</a></td>
                <td><img class="img-rounded m-x-auto d-block product-image" src="{{$product->getPreview()}}" alt=""></td>
                <td>
                    @if ($product->isRecommended())
                        <span class="badge badge-secondary">recommended</span>
                    @else
                        <span class="badge badge-primary">standart</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $products->links() }}
@endsection