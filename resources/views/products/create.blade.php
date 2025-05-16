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
                        <h4 class="mt-2">Add New Product</h4>
                    </div>
                    <div class="float-end">
                        <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm" style="border: 1px solid #2D582E;">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" style="border: 1px solid #2D582E;">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" style="border: 1px solid #2D582E;">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" style="border: 1px solid #2D582E;">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                            <div class="col-md-6">
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" style="border: 1px solid #2D582E;">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" style="border: 1px solid #2D582E;">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="image" class="col-md-4 col-form-label text-md-end text-start">Product Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" style="border: 1px solid #2D582E;">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-warning" value="Add Product" style="border: 1px solid #2D582E;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection