@extends('website.layouts.master')
@section('title', "$product->title")
@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home-ancor') }}">Home</a> <span class="mx-2 mb-0">/</span> <a href="{{ route('shop') }}">Shop</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{$product->title }}</strong></div>
</div>
</div>
</div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                        <img src="{{ $product->image }}" alt="Image" class="img-fluid">
</div>
    <div class="col-md-6">
        <h2 class="text-black">{{ $product->title }}</h2>
            <p>{{ $product->description ?? 'N/A'}}</p>
                {{-- <p class="mb-4">Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p> --}}
                    <p><strong class="text-primary h4">{{ $product->price }} EGP</strong></p>
                        <div class="mb-1 d-flex">
                            <label for="option-sm" class="d-flex mr-3 mb-3">
                                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
</label>
    <label for="option-md" class="d-flex mr-3 mb-3">
        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
</label>
    <label for="option-lg" class="d-flex mr-3 mb-3">
        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
</label>
    <label for="option-xl" class="d-flex mr-3 mb-3">
        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
</label>
</div>
    <div class="mb-5">
        <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
</div>
    <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
        <div class="input-group-append">
            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
</div>
</div>
</div>
            <p><a href="cart.html" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>
</div>
</div>
</div>
</div>
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Related Products</h2>
</div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

                <div class="item">
                    <div class="block-4 text-center">
                        <figure class="block-4-image">
                            <img src="/assets/website/images/cloth_1.jpg" alt="Image placeholder" class="img-fluid">
</figure>
    <div class="block-4-text p-4">
        <h3><a href="#">Tank Top</a></h3>
            <p class="mb-0">Finding perfect t-shirt</p>
                <p class="text-primary font-weight-bold">EGP</p>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection
