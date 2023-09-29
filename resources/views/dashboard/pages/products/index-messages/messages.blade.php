@if(session()->has('created_product_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('created_product_successfully') }}
    </div>
</p>
@elseif(session()->has('updated_product_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('updated_product_successfully') }}
    </div>
</p>
@elseif(session()->has('softDeleted_product_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('softDeleted_product_successfully') }} <a href="{{ route('subcategories.delete') }}">Trash</a>
    </div>
</p>
@elseif(session()->has('restored_product_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('restored_product_successfully') }}
    </div>
</p>
@elseif(session()->has('forceDeleted_product_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('forceDeleted_product_successfully') }}
    </div>
</p>
@endif
