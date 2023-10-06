<form action="{{ route('addRating', $product->id) }}" method="POST">
    @csrf
    <select name="rating_level" class="form-control @error('rating_level') is-invalid @enderror" onchange="this.form.submit()">
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
