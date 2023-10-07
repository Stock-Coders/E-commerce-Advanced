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
                    <div class="card-body" style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url('{{ $customerWishlist->product->image }}'); background-size: 100% 100%; border-radius: 5px;">
                        {{-- <img width="300" src="{{ $customerWishlist->product->image }}" alt=""> --}}
                        <h5 class="card-title fw-bold text-primary">{{$customerWishlist->product->title }}</h5>
                        <div class="d-flex justify-content-center">
                            <p class="card-text bg-dark text-white rounded w-75 text-center p-2">
                                {{ Str::words($customerWishlist->product->description, '10', '...') ?? 'N/A' }} {{-- <hr> --}}
                            </p>
                        </div>
                        <hr>
                        <h4 class="fw-bold">{{ $customerWishlist->product->price }} EGP</h4>
                        <div class="d-flex justify-content-center align-items-center text-center">
                            <a href="{{ /* route('shopSingle.show', $customerWishlist->product->id) */ 'javascript:void(0);' }}" class="btn btn-warning btn-md p-1 m-1 text-dark border-2 border-dark"><i class="far fa-clone p-1"></i> Show Product</a>
                            <form action="{{ route('deleteWishlist',$customerWishlist->id)}}" method="post">
                                @csrf
                                @method("DELETE")
                                @php 
                                $wishlistItemName = $customerWishlist->product->title;
                                @endphp
                                <button class="btn btn-danger btn-md p-1 border-2 border-dark text-white" onclick="return confirm('Are you sure that you want to delete the wishlist for product ({{ $wishlistItemName }})?');" type="submit" title="{{'Delete '."- ($wishlistItemName)"}}"><i class="fa-solid fa-trash-alt p-1"></i> Delete </button>
                            </form>
                        </div>
                    </div>
                    </div>
            </div>
            @empty
            <div class="alert alert-danger text-center my-5 w-75 mx-auto">
                <span class="h6">There are no items i your wishlist yet!</span>
            </div>
        @endforelse
        <div class="my-4">
            {{$customerWishlists->links()}}
        </div>
    </div>
</div>
@endsection
