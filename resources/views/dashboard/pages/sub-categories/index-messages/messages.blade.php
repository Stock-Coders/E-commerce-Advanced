@if(session()->has('created_subCategory_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('created_subCategory_successfully') }}
    </div>
</p>
@elseif(session()->has('updated_subCategory_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('updated_subCategory_successfully') }}
    </div>
</p>
@elseif(session()->has('softDeleted_subCategory_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('softDeleted_subCategory_successfully') }} <a href="{{ route('subcategories.delete') }}">Trash</a>
    </div>
</p>
@elseif(session()->has('restored_subCategory_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('restored_subCategory_successfully') }}
    </div>
</p>
@elseif(session()->has('forceDeleted_subCategory_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('forceDeleted_subCategory_successfully') }}
    </div>
</p>
@endif
