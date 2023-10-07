<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
          <img class="img-rounded" width="60" src="/assets/dashboard/images/logos/e_commerce_advanced_logo.png" alt="">
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
            <span class="pl-2">{{ auth()->user()->user_type == 'admin' ? '(Admin)' : '(Moderator)' }}</span>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="fe fe-monitor fe-16"></i>
            <span class="ml-3 item-text">Website Homepage</span>
          </a>
        </li>
      </ul>

      <p class="text-muted nav-heading mt-4 mb-1 pl-2">
        <span>Dashboard Components</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="#categories" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-box fe-16"></i>
            <span class="ml-3 item-text">Categories</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="categories">
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('categories.index') }}"><span class="ml-1 item-text">All Categories</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('categories.create') }}"><span class="ml-1 item-text">Add Category</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('categories.delete') }}"><span class="ml-1 item-text">All Deleted Categories</span></a>
              </li>
          </ul>
        </li>

        {{-- <li class="nav-item w-100">
          <a class="nav-link" href="widgets.html">
            <i class="fe fe-layers fe-16"></i>
            <span class="ml-3 item-text">Sub-categories</span>
            <span class="badge badge-pill badge-primary">New</span>
          </a>
        </li> --}}

        <li class="nav-item dropdown">
            <a href="#sub-categories" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-layers fe-16"></i>
              <span class="ml-3 item-text">Sub-categories</span>
              {{-- <span class="badge badge-pill badge-primary">New</span> --}}
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="sub-categories">
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('subcategories.index') }}"><span class="ml-1 item-text">All Sub-categories</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('subcategories.create') }}"><span class="ml-1 item-text">Add Sub-category</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('subcategories.delete') }}"><span class="ml-1 item-text">All Deleted Sub-categories</span></a>
                </li>
            </ul>
          </li>

        <li class="nav-item dropdown">
          <a href="#products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-16 fe-codepen"></i>
            <span class="ml-3 item-text">Products</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="products">
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('products.index') }}"><span class="ml-1 item-text">All Products</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('products.create') }}"><span class="ml-1 item-text">Add Product</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('products.delete') }}"><span class="ml-1 item-text">All Deleted Products</span></a>
            </li>
            <li class="nav-link">
                <i class="fe fe-star fe-16"></i>
                <a class="pl-3 text-decoration-none text-dark" href="{{ route('ratings.index') }}"><span class="ml-1 item-text">All Products Ratings</span></a>
            </li>
          </ul>
        </li>

        {{-- <li class="nav-item w-100">
            <a class="nav-link" href="{{ route('ratings.index') }}">
              <i class="fe fe-star fe-16"></i>
              <span class="ml-3 item-text">Products Ratings</span>
            </a>
        </li> --}}

        <li class="nav-item w-100">
            <a class="nav-link" href="{{ route('contacts.index') }}">
              <i class="fe fe-message-square fe-16"></i>
              <span class="ml-3 item-text">Contacts</span>
              <span class="badge badge-pill badge-primary">New</span>
            </a>
          </li>

      </ul>
      {{-- <div class="btn-box w-100 mt-4 mb-1">
        <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
          <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
        </a>
      </div> --}}
    </nav>
  </aside>
