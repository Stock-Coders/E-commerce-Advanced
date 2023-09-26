@extends('dashboard.layouts.master')
@section('title', "Products - unauthorized")
@section('main-content')
<div class="container text-center my-4 p-5">
    <div class="row">
        <h1 class="mb-3">
        </h1>
        <br/>
        <div class="container mt-lg-4 d-flex justify-content-center text-center w-100">
            <span class="alert alert-danger p-2 rounded text-dark h2">Sorry! You are unauthorized to edit products.</span>
        </div>
    </div>
</div>
@endsection

