@extends('dashboard.layouts.master')
@section('title' , 'Sub-categories')
@section('main-content')
<!-- Bordered table -->
@include('dashboard.pages.sub-subcategories.index-messages.messages')
<table class="table table-hover table-bordered @if($subCategories->count() == 0) d-none @endif">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>created_by</th>
        <th>updated_by</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($subCategories as $subCategory)
    <tr>
        <td>{{ $subCategory->id }}</td>
        {{-- <td>
            <div class="progress progress-sm" style="height:3px">
                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td> --}}
        <td>{{ $subCategory->title }}</td>
        <td>{{ $subCategory->description ?? 'N/A' }}</td>
        <td>{{ $subCategory->catgeory->title ?? 'N/A' }}</td>
        <td>{{ $subCategory->create_user_id ?? 'N/A' }}</td>
        <td>{{ $subCategory->update_user_id ?? 'N/A' }}</td>
        <td>{{ $subCategory->created_at }}</td>
        <td>{{ $subCategory->updated_at ?? 'N/A' }}</td>
        <td class="text-light ">
            <div class="d-flex justify-content-between aligin-items-center">
                <a href="{{ route('subcategories.show', $subCategory->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-5">Show</a>
                <a href="{{ route('subcategories.edit', $subCategory->id) }}" class="btn btn-primary btn-sm font-weight-bold fs-5">Edit</a>
                <form action="{{ route('subcategories.destroy', $subCategory->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-5">Delete</button>
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
<div class="my-4">
    {{$subCategories->links()}}
</div>
@endsection
