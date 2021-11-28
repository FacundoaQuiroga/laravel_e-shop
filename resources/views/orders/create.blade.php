@extends('layouts.app')
    @section('content')

        <h1>Order Details</h1>

        <h4 class="text-center"><strong>Grand Total: </strong> {{ $cart->total }}</h4>

        <div class="text-center mb-3">
            <form class="d-inline" method="POST" action="{{ route('orders.store') }}">
                @csrf
                <button type="submit" class="btn btn-success">Confirm Order</button>
            </form>
        </div>


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Producto</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->products as $dato)
                        <tr>
                            <td>
                                <img src="{{ asset($dato->images->first()->path) }}" width="100">
                                {{ $dato->title }}
                            </td>
                            <td>{{ $dato->price }}</td>
                            <td>{{ $dato->pivot->quantity }}</td>
                            <td>
                                <strong>
                                    ${{ $dato->total }}
                                </strong>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    @endsection
