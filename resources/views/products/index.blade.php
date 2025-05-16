@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            <div class="card" style="border: 2px solid #2D582E;">
                <div class="card-header" style="background-color: #2D582E; color: white;">
                    <div class="float-start">
                        <h4 class="mt-2">Products</h4>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('products.create') }}" class="btn btn-warning btn-sm" style="border: 1px solid #2D582E;">
                            <i class="bi bi-plus-circle"></i> Add New Product
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="border: 1px solid #2D582E;">S#</th>
                                <th scope="col" style="border: 1px solid #2D582E;">Code</th>
                                <th scope="col" style="border: 1px solid #2D582E;">Name</th>
                                <th scope="col" style="border: 1px solid #2D582E;">Quantity</th>
                                <th scope="col" style="border: 1px solid #2D582E;">Price</th>
                                <th scope="col" style="border: 1px solid #2D582E;">Image</th>
                                <th scope="col" style="border: 1px solid #2D582E;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row" style="border: 1px solid #2D582E;">{{ $loop->iteration }}</th>
                                    <td style="border: 1px solid #2D582E;">{{ $product->code }}</td>
                                    <td style="border: 1px solid #2D582E;">{{ $product->name }}</td>
                                    <td style="border: 1px solid #2D582E;">{{ $product->quantity }}</td>
                                    <td style="border: 1px solid #2D582E;">{{ $product->price }}</td>
                                    <td style="border: 1px solid #2D582E;">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 100px;">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td style="border: 1px solid #2D582E;">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm" style="border: 1px solid #2D582E;">
                                                <i class="bi bi-eye"></i> Show
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm" style="border: 1px solid #2D582E;">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" style="border: 1px solid #2D582E;" onclick="return confirm('Do you want to delete this product?');">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="7" class="text-center" style="border: 1px solid #2D582E;">
                                    <span class="text-danger">
                                        <strong>No Product Found!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
