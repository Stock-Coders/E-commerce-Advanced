@extends('dashboard.layouts.master')
@section('title' , "Product Rating ($rated_product_name)")
@section('main-content')
<div class="container text-center my-3 mb-2 single-category">
    <div class="bg-dark text-light w-75 mx-auto
        shadow rounded p-5">
        <h2><strong class="text-white">Rated Product:</strong> {{$rated_product_name ?? 'N/A'}}</h2>
        <h4><strong class="text-white">Rating:</strong> {{$rating_level_string ?? 'N/A'}}</h4>
        <p><strong class="text-white">Description:</strong> {{$rating->product->description ?? 'N/A'}}</p>
        <span><strong class="text-white">Rated By:</strong> {{ $rating->customer->name }}</span>
        <hr>
        <div class="">
            <form action="{{ route('ratings.destroy', $rating->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mx-1" type="submit"><i class="fa-solid fa-trash-alt p-1"></i> Delete</button>
                <p class="mt-4">
                    <a href="{{ route('ratings.index') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left p-1"></i> Return to Ratings</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

