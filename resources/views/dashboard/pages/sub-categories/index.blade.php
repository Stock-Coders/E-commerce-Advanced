@extends('dashboard.layouts.master')
@section('title' , 'Sub-categories')
@section('main-content')
<!-- Bordered table -->
@include('dashboard.pages.sub-categories.index-messages.messages')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-end flex-wrap">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <a href="{{ route('subcategories.create') }}" class="btn btn-success text-light font-weight-bold">
            <i class="fa-solid fa-plus"></i>
            <span>Add Sub-category</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
        <p class="fs-5">
            Results (<span class="fw-bold">{{ \App\Models\SubCategory::count() }}</span>)
        </p>
    </div>
</div>
<table class="table table-hover table-bordered @if($subCategories->count() == 0) d-none @endif">
    <thead class="thead-dark text-center">
    <tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Title</th>
        <th class="font-weight-bold">Description</th>
        <th class="font-weight-bold">Category</th>
        <th class="font-weight-bold">Created By</th>
        <th class="font-weight-bold">Updated By</th>
        <th class="font-weight-bold">Created At</th>
        <th class="font-weight-bold">Updated At</th>
        <th class="font-weight-bold">Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($subCategories as $subCategory)
    <tr>
        <td class="font-weight-bold">{{ $loop->iteration }}</td>
        {{-- <td>
            <div class="progress progress-sm" style="height:3px">
                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td> --}}
        <td>{{ $subCategory->title }}</td>
        <td>{{ Str::words($subCategory->description, '5', '...') ?? 'N/A' }}</td>
        <td>{{ $subCategory->catgeory->title ?? 'N/A' }}</td>
        <td>{{ $subCategory->create_user->name ?? 'N/A' }}</td>
        <td>{{ $subCategory->update_user->name ?? 'N/A' }}</td>
        <td>{{ $subCategory->created_at }}</td>
        <td>{{ $subCategory->updated_at ?? 'N/A' }}</td>
        <td class="text-light ">
            <div class="d-flex justify-content-between aligin-items-center">
                <form action="{{ route('subcategories.destroy', $subCategory->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('subcategories.show', $subCategory->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6">Show</a>
                    @if(auth()->user()->user_type == "admin")
                    <a href="{{ route('subcategories.edit', $subCategory->id) }}" class="btn btn-primary btn-sm font-weight-bold fs-6">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6">Delete</button>
                    @endif
                </form>
            </div>
        </td>
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no sub-ategories yet! <a href="{{ route('subcategories.create') }}" class="fw-bold text-dark">Add sub-categories from here</a>.</span>
    </div>
    @endforelse
    </tbody>
</table>
<nav class="m-b-30" aria-label="Page navigation example">
    <ul class="pagination justify-content-center pagination-primary">
        {!! $subCategories->links('pagination::bootstrap-5') !!}
    </ul>
</nav>
@endsection
