@extends('dashboard.layouts.master')
@section('title', "Categories - unauthorized")
@section('main-content')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3">
            <u>
                {{-- @if(Route::is('categories.show'))
                    All Category's Products
                @elseif(Route::is('categories.edit'))
                    Edit Category
                @endif --}}
            </u>
        </h1>
        <br/>
        <div class="container mt-lg-4 d-flex justify-content-center text-center w-100">
            <span class="alert alert-danger p-2 rounded text-dark h2">Sorry! You are unauthorized to edit categories.</span>
        </div>
    </div>
</div>
@endsection

