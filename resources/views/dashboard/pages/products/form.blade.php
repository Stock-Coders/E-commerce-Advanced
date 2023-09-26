<div class="form-group mb-3">
    <label for="title">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : $product->title }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <span class="invalid-feedback " role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="description"> Description </label>
    <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px">{{ $product->description }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="price">Price <span class="text-danger">*</span></label>
    <input type="number" name="price" id="price" value="{{ Request::old('price') ? Request::old('price') : $product->price }}" class="form-control @error('price') is-invalid @enderror">
    @error('price')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="available_quantity">Available Quantity <span class="text-danger">*</span></label>
    <input type="number" name="available_quantity" id="available_quantity" value="{{ Request::old('available_quantity') ? Request::old('available_quantity') : $product->available_quantity }}" class="form-control @error('available_quantity') is-invalid @enderror">
    @error('available_quantity')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="example-palaceholder">Category</label>
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        @if($categories->count() > 0)
        <option value="" selected>-------- Select a category --------</option>
        @endif
        @forelse($categories as $cat)
        <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->title }}</option>
        @empty
        <option value="" class="">-------- No categories --------</option>
        @endforelse
    </select>
    @error('category_id')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="example-palaceholder">Sub-category</label>
    <select class="form-control @error('sub_category_id') is-invalid @enderror" name="sub_category_id" id="sub_category_id">
        @if($subCategories->count() > 0)
        <option value="" selected>-------- Select a sub-category --------</option>
        @endif
        @forelse($subCategories as $subCat)
        <option value="{{ $subCat->id }}" {{ $subCat->id == $product->sub_category_id ? 'selected' : '' }}>{{ $subCat->title }}</option>
        @empty
        <option value="" class="">-------- No sub-categories --------</option>
        @endforelse
    </select>
    @error('sub_category_id')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>
