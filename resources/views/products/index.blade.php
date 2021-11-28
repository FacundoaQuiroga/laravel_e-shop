@extends('layouts.app')
    @section('content')

        <h1>List of Products</h1>

        <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create new product</a>

        @empty($product)
            <div class="alert alert-warning">
                The list of products is empty
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $dato)
                        <tr>
                            <td>{{ $dato->id }}</td>
                            <td>{{ $dato->title }}</td>
                            <td>{{ $dato->description }}</td>
                            <td>{{ $dato->price }}</td>
                            <td>{{ $dato->stock }}</td>
                            <td>{{ $dato->status }}</td>
                            <td>
                                <a class="btn btn-link" href="{{ route('products.show', ['product' => $dato->id]) }}">Show</a>
                                <a class="btn btn-link" href="{{ route('products.edit', ['product' => $dato->id]) }}">Edit</a>

                                <form method="POST" class="d-inline" action="{{ route('products.destroy', ['product' => $dato->id]) }}" >
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-link">Delete</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endempty
    @endsection
