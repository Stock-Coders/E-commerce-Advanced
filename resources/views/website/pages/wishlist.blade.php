@extends('website.layouts.master')
@section('title' , 'Your Wishlist')
@section('main-content')
<div class="container text-center">
    <div class="row">
        <h3 class="mb-3"><u>Your Wishlist Items ({{ \App\Models\Wishlist::where('customer_id', auth()->user()->id)->count() }})</u></h3><br/>
        @include('website.includes.products-wishlist-rating-messages.products-wishlist-rating-messages')
        <p>
            <form action="{{ route('clearWishlist') }}" method="post" class="p-1 text-left">
                @csrf
                @method("DELETE")
                <button class="btn btn-dark btn-md p-1 border-2 border-dark text-white" onclick="return confirm('Are you sure that you want to clear all the items within your wishlist?');" type="submit"><i class="fa-solid fa-broom p-1"></i> Clear All Items</button>
            </form>
        </p>
        @forelse ($customerWishlists as $customerWishlist)
            <div class="my-2 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    {{-- <div class="card-body" style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url('{{ $customerWishlist->product->image }}'); background-size: 100% 100%; border-radius: 5px;"> --}}
                    <div class="card-body">
                        <img width="300" class="rounded" src="{{ $customerWishlist->product->image }}" alt="">
                        <h5 class="card-title fw-bold text-primary">
                            <a class="text-decoration-none" href="{{ route('shop-single', $customerWishlist->product->id) }}">{{$customerWishlist->product->title }}</a>
                        </h5>
                        <div class="d-flex justify-content-center">
                            <p class="card-text bg-dark text-white rounded w-75 text-center p-2">
                                {{ Str::words($customerWishlist->product->description, '10', '...') ?? 'N/A' }} {{-- <hr> --}}
                            </p>
                        </div>
                        <hr>
                        <h4 class="fw-bold">{{ $customerWishlist->product->price }} EGP</h4>
                        <div class="d-flex justify-content-center align-items-center text-center">
                            <a href="{{ route('shop-single', $customerWishlist->product->id) }}" class="btn btn-warning btn-md p-1 m-1 text-dark border-2 border-dark"><i class="far fa-clone p-1"></i> Show Product</a>
                            <form action="{{ route('deleteWishlist',$customerWishlist->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                @php
                                $wishlistItemName = $customerWishlist->product->title;
                                @endphp
                                <button class="btn btn-danger btn-md p-1 border-2 border-dark text-white" onclick="return confirm('Are you sure that you want to delete the wishlist for product ({{ $wishlistItemName }})?');" type="submit" title="{{'Delete '."- ($wishlistItemName)"}}"><i class="fa-solid fa-trash-alt p-1"></i> Delete </button>
                            </form>
                            <form action="{{ route('addRating', $customerWishlist->product->id) }}" method="POST">
                                @csrf
                                <select name="rating_level" class="form-control m-1 @error('rating_level') is-invalid @enderror" onchange="this.form.submit()">
                                    <option value="" selected>----- Rate this product -----</option>
                                    <option value="1">Poor</option>
                                    <option value="2">Average</option>
                                    <option value="3">Good</option>
                                    <option value="4">Very Good</option>
                                    <option value="5">Excellent</option>
                                </select>
                                @error('rating_level')
                                    <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </form>
                        </div>
                    </div>
                    </div>
            </div>
            @empty
            <div class="alert alert-danger text-center my-5 w-75 mx-auto">
                <span class="h6">There are no items in your wishlist yet! <a href="{{ route('shop') }}" class="fw-bold text-dark">Click here to add items in your wishlist from the shop</a>.</span>
            </div>
        @endforelse
        <div class="my-4">
            {{$customerWishlists->links()}}
        </div>
    </div>
</div>
@endsection
