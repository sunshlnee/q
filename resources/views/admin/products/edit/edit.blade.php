@extends('layouts.app')

@section('content')
    @include('admin.products._nav')
    <form method="POST" action="?">
            @csrf
            @method('PUT')
    
            <div class="card mb-3">
                <div class="card-header">
                    Common
                </div>
                <div class="card-body pb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code" class="col-form-label">Code</label>
                                <input id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code', $product->code) }}" required>
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('code') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="col-form-label">Price</label>
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price', $product->price) }}" required>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-3">@include('layouts.fields.brands')</div>
                            <div class="col-md-3">@include('layouts.fields.sizes')</div>
                            <div class="col-md-3">@include('layouts.fields.fabrics')</div>
                            <div class="col-md-3">@include('layouts.fields.colors')</div>
                        </div>

                    
                </div>
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

@endsection