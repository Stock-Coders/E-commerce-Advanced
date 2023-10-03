@extends('dashboard.layouts.master')
@section('title' , 'Deleted Sub-Categories')
@section('main-content')
<!-- Bordered table -->
<table class="table table-hover table-bordered @if($subCategories->count() == 0) d-none @endif">
    <thead class="thead-dark text-center">
    <tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Title</th>
        <th class="font-weight-bold">Description</th>
        <th class="font-weight-bold">Created By</th>
        <th class="font-weight-bold">Updated By</th>
        <th class="font-weight-bold">Created At</th>
        <th class="font-weight-bold">Updated At</th>
        <th class="font-weight-bold">Deleted At</th>
        @if(auth()->user()->user_type == "admin")
        <th class="font-weight-bold">Action</th>
        @endif
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
        <td>{{ $subCategory->create_user->name }}</td>
        <td>{{ $subCategory->update_user->name ?? 'N/A' }}</td>
        <td>{{ $subCategory->created_at }}</td>
        <td>{{ $subCategory->updated_at ?? 'N/A' }}</td>
        <td>{{ $subCategory->deleted_at ?? 'N/A' }}</td>
        @if(auth()->user()->user_type == "admin")
        <td class="text-light">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <form action="{{ route('subcategories.restore', $subCategory->id) }}" method="GET">
                        <button type="submit" class="btn btn-success btn-sm font-weight-bold fs-6 mx-1">Restore</button>
                    </form>
                </div>
                <div>
                    <form action="{{ route('subcategories.forceDelete', $subCategory->id) }}" method="post">
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
        <span class="h6">There are no deleted sub-categories yet!</span>
    </div>
    @endforelse
    </tbody>
</table>
<div class="my-4">
    {{$subCategories->links()}}
</div>
@endsection
