@extends('dashboard.layouts.master')
@section('title' , 'Deleted Sub-Categories')
@section('main-content')
<!-- Bordered table -->
<table class="table table-hover table-bordered @if($subCategories->count() == 0) d-none @endif">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>created_at</th>
        <th>updated_at</th>
        <th>deleted_at</th>
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
        <td>{{ $subCategory->created_at }}</td>
        <td>{{ $subCategory->updated_at ?? 'N/A' }}</td>
        <td>{{ $subCategory->deleted_at ?? 'N/A' }}</td>
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no sub-categories yet! <a href="{{ route('subcategories.create') }}" class="fw-bold text-dark">Add sub-categories from here</a>.</span>
    </div>
    @endforelse
    </tbody>
</table>
<div class="my-4">
    {{$subCategories->links()}}
</div>
@endsection
