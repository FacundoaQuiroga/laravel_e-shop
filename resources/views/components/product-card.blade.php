<div class="card">
    <img class="card-img-top " src="{{ asset($data->images->first()->path) }}" height="500">
    <div class="card-body">
        <h4 class="text-right"><strong> ${{ $data->price }}</strong></h4>
        <h5 class="card-title"><strong>{{ $data->title }}</strong></h5>
        <p class="card-text">{{ $data->description }}</p>
        <p class="card-text"><strong>{{ $data->stock }} left</strong></p>
        @if(isset($cart))
            <p class="card-text">{{ $data->pivot->quantity }} in your cart<strong>(${{ $data->total }})</strong></p>

            <form class="d-inline" method="POST" action="{{ route('products.cart.destroy', ['cart' => $cart->id, 'product' => $data->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Remove From Cart</button>
            </form>

        @else
            <form class="d-inline" method="POST" action="{{ route('products.cart.store', ['product' => $data->id]) }}">
                @csrf
                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
        @endif
    </div>
</div>

