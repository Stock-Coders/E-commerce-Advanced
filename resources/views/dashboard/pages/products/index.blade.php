@extends('dashboard.layouts.master')
@section('title' , 'Sub-categories')
@section('main-content')
<!-- Bordered table -->
@include('dashboard.pages.sub-categories.index-messages.messages')
<table class="table table-hover table-bordered @if($products->count() == 0) d-none @endif">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Available Quantity</th>
        <th>Category</th>
        <th>Sub-category</th>
        <th>created_by</th>
        <th>updated_by</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        {{-- <td>
            <div class="progress progress-sm" style="height:3px">
                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td> --}}
        <td>{{ $product->title }}</td>
        <td>{{ $product->description ?? 'N/A' }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->available_quantity }}</td>
        <td>{{ $product->category->title ?? 'N/A' }}</td>
        <td>{{ $product->subCategory->title ?? 'N/A' }}</td>
        <td>{{ $product->create_user->name }}</td>
        <td>{{ $product->update_user->name ?? 'N/A' }}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->updated_at ?? 'N/A' }}</td>
        <td class="text-light ">
            <div class="d-flex justify-content-between aligin-items-center">
                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-5">Show</a>
                    @if(auth()->user()->user_type == "admin")
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm font-weight-bold fs-6">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6">Delete</button>
                    @endif
                </form>
            </div>
        </td>
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no products yet! <a href="{{ route('products.create') }}" class="fw-bold text-dark">Add products from here</a>.</span>
    </div>
    @endforelse
    </tbody>
</table>
<div class="my-4">
    {{$products->links()}}
</div>
@endsection
