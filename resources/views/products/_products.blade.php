<div class="card-group">
    <div class="row">
        @foreach($products as $product)
            <div class="card" style="margin:0 5px 10px 5px">
                <a href="{{route('products.show', $product)}}">
                    <img class="card-img-top" src="{{$product->getPreview()}}" width="200px" height="200px">
                </a>
                <div class="card-body" style="font-size:20px; padding:5px 0px 5px 0px; text-align:center;">
                        <h5 style="display:inline-block; margin-bottom:0px; padding-right:10px;">{{$product->code}}</h5>  
                        @auth
                            @if (Auth::user()->hasInCard($product->id))
                                <div>
                                    <card-button :has="true" :product="{{$product->id}}"></card-button>
                                </div>
                            @else
                                <div>
                                    <card-button :has="false" :product="{{$product->id}}"></card-button>
                                </div>                        
                            @endif
                        @endauth
                        {{$product->price}}р
                </div>
        </div>
        @endforeach
    </div>
</div>