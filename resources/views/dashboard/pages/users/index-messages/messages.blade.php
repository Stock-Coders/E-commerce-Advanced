@if(session()->has('created_user_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('created_user_successfully') }}
    </div>
</p>
@elseif(session()->has('updated_user_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('updated_user_successfully') }}
    </div>
</p>
@elseif(session()->has('deleted_user_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('deleted_user_successfully') }} <a href="{{ route('users.delete') }}">Trash</a>
    </div>
</p>
@endif
