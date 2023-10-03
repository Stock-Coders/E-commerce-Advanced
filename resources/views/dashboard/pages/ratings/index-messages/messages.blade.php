@if(session()->has('successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('successfully') }}
    </div>
</p>
@endif
