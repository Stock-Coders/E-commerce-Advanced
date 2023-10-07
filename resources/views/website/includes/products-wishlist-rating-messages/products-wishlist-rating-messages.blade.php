@if(session()->has('addWishlist_unsuccessfully'))
<p>
    <div class="alert alert-danger text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('addWishlist_unsuccessfully') }}
    </div>
</p>
@elseif(session()->has('addWishlist_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('addWishlist_successfully') }}
    </div>
</p>
@elseif(session()->has('no_items_already_wishlist'))
<p>
    <div class="alert alert-danger text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('no_items_already_wishlist') }}
    </div>
</p>
@elseif(session()->has('clear_wishlistItems_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('clear_wishlistItems_successfully') }}
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