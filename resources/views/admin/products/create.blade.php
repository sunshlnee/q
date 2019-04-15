@extends('layouts.app')

@section('content')
    @include('admin.products._nav')
    <form method="POST" action="{{route('admin.products.store')}}">
            @csrf
            
            <div class="card mb-3">
                <div class="card-header">
                    Common
                </div>
                <div class="card-body pb-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code" class="col-form-label">Code</label>
                                <input id="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required>
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('code') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price" class="col-form-label">Price</label>
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label for="category_id" class="col-form-label">Category</label>
                                        <select required id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
                                            <option value=""></option>
                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}"{{ $parent->id == old('category_id') ? ' selected' : '' }}>
                                                    @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                                    {{ $parent->title }}
                                                </option>
                                            @endforeach;
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                                        @endif
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">@include('layouts.fields.brands')</div>
                        <div class="col-md-3">@include('layouts.fields.sizes')</div>
                        <div class="col-md-3">@include('layouts.fields.fabrics')</div>
                        <div class="col-md-3">@include('layouts.fields.colors')</div>
                        <multiple-select :inf="[{value: 1, text: 'сука'}, {value: 2, text: 'работай'}]"></multiple-select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

@endsection