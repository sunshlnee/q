@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('layouts.partials.sidebar')
        </div>

        <div class="col-md-9">
            @include('products._products')
        </div>
        
    </div>
@endsection
