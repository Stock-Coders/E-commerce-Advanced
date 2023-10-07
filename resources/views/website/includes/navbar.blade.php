<header class="site-navbar w-100 @if(Route::is('login') || Route::is('register')) d-none @endif" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    {{-- <form action="" class="site-block-top-search">
                        <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" placeholder="Search">
</form> --}}
<a href="{{ route('home-ancor') }}" class="js-logo-clone text-decoration-none">
    <img width="80" src="/assets/dashboard/images/logos/e_commerce_advanced_logo.png" alt="">
    <span class="text-primary fw-bold">StockCoders</span>
</a>

</div>

    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
        <div class="site-log">
            {{-- <a href="{{ route('home-ancor') }}" class="js-logo-clone"><img width="100" src="/assets/dashboard/images/logos/e_commerce_advanced_logo.png" alt=""></a> --}}
            <form action="" class="site-block-top-search">
                        <span class="icon icon-search2 pl-1"></span>
                            <input type="text" class="form-control border-1" placeholder="Search">
</form>
<label class="text-center mt-2">
    {{-- <label class="text-primary fw-bold">#</label>LEARN
    <label class="text-primary fw-bold">#</label>CODE
    <label class="text-primary fw-bold">#</label>GROW --}}

    <label class="text-primary fw-bold fs-5">#</label><label class="fs-4" style="font-family: 'Brush Script MT', cursive;">LEARN</label>&nbsp;
    <label class="text-primary fw-bold fs-5">#</label><label class="fs-4" style="font-family: 'Brush Script MT', cursive;">CODE</label>&nbsp;
    <label class="text-primary fw-bold fs-5">#</label><label class="fs-4" style="font-family: 'Brush Script MT', cursive;">GROW</label>&nbsp;
</label>
</div>
</div>
    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
        <div class="site-top-icons">
            <ul class="btn-group">
                <li>
                    @auth
                        <a class="text-decoration-none" href="javascript:void(0);">{{ auth()->user()->name ?? '' }}</a>
                    @endauth
                    @guest
                        <a class="text-decoration-none">{{ 'guest_'.uniqid() }}</a>
                    @endguest
                </li>
                {{-- <li><a href="#"><span class="icon icon-person"></span></a></li> --}}
                @auth
                @if(auth()->user()->user_type == "customer")
                <li><a class="text-decoration-none text-danger" href="{{ route('wishlist') }}"><span class="icon icon-heart-o"></span></a></li>
                        <li>
                            <a href="{{ route('cart') }}" class="site-cart">
                                <span class="icon icon-shopping_cart"></span>
                                    <span class="count">2</span>
</a>
</li>@endif @endauth

<a type="button" class="dropdown-toggle p-1" data-toggle="dropdown" area-haspopup="true" area-expanded="false">
    <span class="icon icon-person"></span>
</a>
<div class="dropdown-menu dropdown-menu-right">
    @if(auth()->user())
        <button class="dropdown-item" type="button" onclick="window.location.href = '{{ route('showProfile', auth()->user()->id) }}';">
            <i class="fa-solid fa-user">
            </i>  Profile Management</button>
            @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
                <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('dashboard')}}';">
                    <i class="fa-brands fa-fort-awesome" ></i> Dashboard
</button>
        @endif
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: ;">
                @csrf
            </form>
        </a>
    @else
        <button class="dropdown-item" type="button" onclick="window.location.href = '{{ route('login') }}';">Login</button>
        <button class="dropdown-item" type="button" onclick="window.location.href = '{{ route('register') }}';">Register</button>
    @endif
</div>
    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
</div>
</ul>
</div>
</div>
</div>
</div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li class="has-children @if(Route::is('home-ancor') || Route::is('home')) active @endif">
                    <a href="{{ route('home-ancor') }}">Home</a>
                        <ul class="dropdown">
                            <li><a href="#">Menu One</a></li>
                                <li><a href="#">Menu Two</a></li>
                                    <li><a href="#">Menu Three</a></li>
                                        <li class="has-children">
                                            <a href="#">Sub Menu</a>
                                                <ul class="dropdown">
                                                        <li><a href="#">Menu One</a></li>
                                                            <li><a href="#">Menu Two</a></li>
                                                                <li><a href="#">Menu Three</a></li>
</ul>
</li>
</ul>
</li>
    <li class="has-children @if(Route::is('about')) active @endif">
        <a href="{{route('about')}}">About</a>
            <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
</ul>
</li>
    <li class="has-children @if(Route::is('shop')) active @endif"><a href="{{ route("shop") }}">Shop</a></li>
        <li class="has-children @if(Route::is('category')) active @endif"><a href="{{ route('category') }}">Category</a></li>
            {{-- <li><a href="#">New Arrivals</a></li> --}}
                <li class="has-children @if(Route::is('contact')) active @endif"><a href="{{route('contact')}}">Contact</a></li>
</ul>
</div>
</nav>
</header>

