<form action="{{ route('addWishlist', $product->id) }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-success shadow">Add to Wishlist</button>
</form>
