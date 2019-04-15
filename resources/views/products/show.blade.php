@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
                @include('layouts.partials.sidebar')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    {{$product->category->title." ". $product->code}}
                    @auth
                        @if (Auth::user()->hasInCard($product->id))
                            <div class="float-right">
                                <card-button :has="true" :product="{{$product->id}}"></card-button>
                            </div>
                        @else
                            <div class="float-right">
                                <card-button :has="false" :product="{{$product->id}}"></card-button>
                            </div>                        
                        @endif
                    @endauth

                </div>
                <div class="card-body">
                    <gallery :images="{{$images}}"></gallery>
                </div>
                <div class="card-footer" >
                    <p>Артикул: {{ $product->code }}</p>
                    <p>Цена: {{ $product->price }}</p>
                    @if($colors) <p>Цвета: {{$colors}}</p> @endif
                    @if($fabrics) <p>Состав: {{$fabrics}}</p> @endif
                    @if($sizes) <p>Размеры: {{$sizes}}</p> @endif
                </div>
            </div>
        </div>
    </div>
@endsection