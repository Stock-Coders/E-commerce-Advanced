@extends('dashboard.layouts.master')
@section('title' , 'Deleted Products')
@section('main-content')
<!-- Bordered table -->
<div class="row">
    <p class="fs-5">
        Results (<span class="fw-bold">{{ \App\Models\Product::onlyTrashed()->count() }}</span>)
    </p>
</div>
<table class="table table-hover table-bordered @if($products->count() == 0) d-none @endif">
    <thead class="thead-dark text-center">
    <tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Title</th>
        <th class="font-weight-bold">Description</th>
        <th class="font-weight-bold">Price</th>
        <th class="font-weight-bold">Available Quantity</th>
        <th class="font-weight-bold">Category</th>
        <th class="font-weight-bold">Sub-category</th>
        <th class="font-weight-bold">Created By</th>
        <th class="font-weight-bold">Updated By</th>
        <th class="font-weight-bold">Created At</th>
        <th class="font-weight-bold">Updated At</th>
        <th class="font-weight-bold">Deleted At</th>
        <th class="font-weight-bold">Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
    <tr>
        <td class="font-weight-bold">{{ $loop->iteration }}</td>
        {{-- <td>
            <div class="progress progress-sm" style="height:3px">
                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td> --}}
        <td>{{ $product->title }}</td>
        <td>{{ Str::words($product->description, '5', '...') ?? 'N/A' }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->available_quantity }}</td>
        <td>{{ $product->category->title ?? 'N/A' }}</td>
        <td>{{ $product->subCategory->title ?? 'N/A' }}</td>
        <td>{{ $product->create_user->name }}</td>
        <td>{{ $product->update_user->name ?? 'N/A' }}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->updated_at ?? 'N/A' }}</td>
        <td>{{ $product->deleted_at ?? 'N/A' }}</td>
        @if(auth()->user()->user_type == "admin")
        <td class="text-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <form action="{{ route('products.restore', $product->id) }}" method="GET">
                        <button type="submit" class="btn btn-success btn-sm font-weight-bold fs-6 mx-1">Restore</button>
                    </form>
                </div>
                <div>
                    <form action="{{ route('products.forceDelete', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6 mx-1">Delete from Trash</button>
                    </form>
                </div>
            </div>
        </td>
        @endif
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no deleted products yet!</span>
    </div>
    @endforelse
    </tbody>
</table>
<nav class="m-b-30" aria-label="Page navigation example">
    <ul class="pagination justify-content-center pagination-primary">
        {!! $products->links('pagination::bootstrap-5') !!}
    </ul>
</nav>
@endsection
