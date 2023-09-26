@extends('website.layouts.master')
@section('title' , 'Thank You')
@section('main-content')
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="" class="site-block-top-search">
                                <span class="icon icon-search2"></span>
                                    <input type="text" class="form-control border-0" placeholder="Search">
</form>
</div>
    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
        <div class="site-logo">
                <a href="index.html" class="js-logo-clone">Shoppers</a>
</div>
</div>
    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
        <div class="site-top-icons">
            <ul>
                <li><a href="#"><span class="icon icon-person"></span></a></li>
                <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                <li><a href="cart.html" class="site-cart">
                    <span class="icon icon-shopping_cart"></span>
                    <span class="count">2</span>
</a>
</li>
    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
    </header>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
</div>
</div>
</div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                        <h2 class="display-3 text-black">Thank you!</h2>
                            <p class="lead mb-5">You order was successfuly completed.</p>
                                <p><a href="shop.html" class="btn btn-sm btn-primary">Back to shop</a></p>
</div>
</div>
</div>
</div>
</div>
@endsection
