<div class="form-group mb-3">
    <label for="title">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : $subCategory->title }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <span class="invalid-feedback " role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="description"> Description </label>
    <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px">{{ $subCategory->description }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="example-palaceholder"> Category <span class="text-danger">*</span></label>
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        @if($categories->count() > 0)
        <option value="" selected>-------- Select a category --------</option>
        @endif
        @forelse($categories as $cat)
        <option value="{{ $cat->id }}" {{ $cat->id == $subCategory->category_id ? 'selected' : '' }}>{{ $cat->title }}</option>
        @empty
        <option value="" class="">-------- No categories --------</option>
        @endforelse
    </select>
    @error('category_id')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>
