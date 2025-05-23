@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Welcome to Laravel 11 CRUD Application</div>
            <div class="card-body">
                <h5 class="card-title">Product Management System</h5>
                
                
                @guest
                    <div class="mt-4">
                        <p>Please login or register to access the products management system.</p>
                        <center><div class="d-flex gap-2" style="align-items: center">
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                        </div></center>
                    </div>
                @else
                    <div class="mt-4">
                        <p>You are logged in. You can now access the products management system.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Go to Products</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection
