@extends('website.layouts.master')
@section('title' , 'Wishlist')
@section('main-content')
@if(session()->has('addWishlist_successfully'))
        <p>
            <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
                {{ session()->get('addWishlist_successfully') }}
            </div>
        </p>
        @elseif(session()->has('addWishlist_already_added_unsuccessfully'))
        <p>
            <div class="alert alert-danger text-center mx-auto" style="width: 90%; margin-top: 3%;">
                {{ session()->get('addWishlist_already_added_unsuccessfully') }}
            </div>
        </p>
        @elseif(session()->has('productDeleted_successfully'))
        <p>
            <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
                {{ session()->get('productDeleted_successfully') }}
            </div>
        </p>
        @elseif(session()->has('successful_rating'))
        <p>
            <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
                {{ session()->get('successful_rating') }}
            </div>
        </p>
        @elseif(session()->has('unsuccessful_rating'))
        <p>
            <div class="alert alert-danger text-center mx-auto" style="width: 90%; margin-top: 3%;">
                {{ session()->get('unsuccessful_rating') }}
            </div>
        </p>
        @endif

        @forelse($customerWishlists as $customerWishlist)
            {{ $customerWishlist->product->title }}
        @empty
        Ana et5n2t
        @endforelse

@endsection
