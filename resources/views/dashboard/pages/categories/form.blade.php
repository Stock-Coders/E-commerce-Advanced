<div class="form-group mb-3">
    <label for="title">Title <span class="text-danger">*</span></label>
    <input type="text" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : $category->title }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <span class="invalid-feedback " role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="description">Description </label>
    <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px">{{ $category->description }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>
