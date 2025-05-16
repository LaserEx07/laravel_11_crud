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
                        <h4 class="mt-2">Product Details</h4>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm" style="border: 1px solid #2D582E;">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-end fw-bold" style="color: #2D582E;">Code:</div>
                        <div class="col-md-6">{{ $product->code }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-end fw-bold" style="color: #2D582E;">Name:</div>
                        <div class="col-md-6">{{ $product->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-end fw-bold" style="color: #2D582E;">Quantity:</div>
                        <div class="col-md-6">{{ $product->quantity }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-end fw-bold" style="color: #2D582E;">Price:</div>
                        <div class="col-md-6">{{ $product->price }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-end fw-bold" style="color: #2D582E;">Description:</div>
                        <div class="col-md-6">{{ $product->description }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-md-end fw-bold" style="color: #2D582E;">Image:</div>
                        <div class="col-md-6">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 100px;">
                            @else
                                <span class="text-muted">No image available</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" style="border: 1px solid #2D582E;">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="border: 1px solid #2D582E;" onclick="return confirm('Do you want to delete this product?');">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection