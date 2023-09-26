@extends('dashboard.layouts.master')
@section('title' , 'Categories')
@section('main-content')
<!-- Bordered table -->
@include('dashboard.pages.categories.index-messages.messages')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-end flex-wrap">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <a href="{{ route('categories.create') }}" class="btn btn-success text-light font-weight-bold">
            <i class="fa-solid fa-plus"></i>
            <span>Add Category</span>
          </a>
        </div>
      </div>
    </div>
</div>
<table class="table table-hover table-bordered @if($categories->count() == 0) d-none @endif">
    <thead class="thead-dark">
    <tr>
        <th class="font-weight-bold">ID</th>
        <th class="font-weight-bold">Title</th>
        <th class="font-weight-bold">Description</th>
        <th class="font-weight-bold">Created By</th>
        <th class="font-weight-bold">Updated By</th>
        <th class="font-weight-bold">Created At</th>
        <th class="font-weight-bold">Updated At</th>
        <th class="font-weight-bold">Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($categories as $category)
    <tr>
        <td class="font-weight-bold">{{ $category->id }}</td>
        {{-- <td>
            <div class="progress progress-sm" style="height:3px">
                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td> --}}
        <td>{{ $category->title }}</td>
        <td>{{ $category->description ?? 'N/A' }}</td>
        <td>{{ $category->create_user->name ?? '...' }}</td>
        <td>{{ $category->update_user->name ?? 'N/A' }}</td>
        <td>{{ $category->created_at }}</td>
        <td>{{ $category->updated_at ?? 'N/A' }}</td>
        <td>
            <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="d-flex justify-content-between aligin-items-center">
                @csrf
                @method('DELETE')
                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6">Show</a>
                @if(auth()->user()->user_type == "admin")
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm font-weight-bold fs-6">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6">Delete</button>
                @endif
            </form>
        </td>
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no categories yet! <a href="{{ route('categories.create') }}" class="fw-bold text-dark">Add categories from here</a>.</span>
    </div>
    @endforelse
    </tbody>
</table>
<div class="my-4">
    {{$categories->links()}}
</div>
@endsection
