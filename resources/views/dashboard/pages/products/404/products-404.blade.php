@extends('dashboard.layouts.master')
@section('title', "Products - 404")
@section('main-content')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3">
            <u>
                {{-- @if(Route::is('products.show'))
                    All Category's Products
                @elseif(Route::is('products.edit'))
                    Edit Category
                @endif --}}
            </u>
        </h1>
        <br/>
        <div class="container mt-lg-4 d-flex justify-content-center text-center w-100">
            <span class="alert alert-danger p-2 rounded text-dark h2">Sorry! The product that you are searching for is not found.</span>
        </div>
    </div>
</div>
@endsection



