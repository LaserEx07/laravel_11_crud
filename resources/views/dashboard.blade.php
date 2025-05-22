@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <h5>Welcome, {{ Auth::user()->name }}!</h5>
                <p>You are logged in!</p>
                <div class="mt-3">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Go to Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
