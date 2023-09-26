@extends('dashboard.layouts.master')
@section('title' , 'Categories')
@section('main-content')
<!-- Bordered table -->
@if(session()->has('created_category_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('created_category_successfully') }}
        {{-- <a href="{{ route('products.delete') }}">Check Trashed Products</a> --}}
    </div>
</p>
@elseif(session()->has('updated_category_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('updated_category_successfully') }}
        {{-- <a href="{{ route('products.delete') }}">Check Trashed Products</a> --}}
    </div>
</p>
@elseif(session()->has('deleted_category_successfully'))
<p>
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        {{ session()->get('deleted_category_successfully') }}
        {{-- <a href="{{ route('products.delete') }}">Check Trashed Products</a> --}}
    </div>
</p>
@endif
<table class="table table-hover table-bordered @if($categories->count() == 0) d-none @endif">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        {{-- <td>
            <div class="progress progress-sm" style="height:3px">
                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td> --}}
        <td>{{ $category->title }}</td>
        <td>{{ $category->description ?? 'N/A' }}</td>
        <td>{{ $category->created_at }}</td>
        <td>{{ $category->updated_at ?? 'N/A' }}</td>
        <td class="text-light ">
            <div class="d-flex justify-content-between aligin-items-center">
                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-5">Show</a>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm font-weight-bold fs-5">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-5">Delete</button>
                </form>
            </div>
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
