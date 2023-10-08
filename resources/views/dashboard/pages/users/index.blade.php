@extends('dashboard.layouts.master')
@section('title' , 'Users')
@section('main-content')
<!-- Bordered table -->
@include('dashboard.pages.users.index-messages.messages')
@php
    $users_count = \App\Models\User::count();
@endphp
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-end flex-wrap">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <a href="{{ route('users.create') }}" class="btn btn-success text-light font-weight-bold">
            <i class="fa-solid fa-plus"></i>
            <span>Add User</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
        <p class="fs-5">
            Results (<span class="fw-bold">{{ $users_count }}</span>)
        </p>
    </div>
</div>
<table class="table table-hover table-bordered @if($users_count == 0) d-none @endif">
    <thead class="thead-dark text-center">
    <tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Name</th>
        <th class="font-weight-bold">Email</th>
        <th class="font-weight-bold">User Type</th>
        <th class="font-weight-bold">Created By</th>
        <th class="font-weight-bold">Updated By</th>
        <th class="font-weight-bold">Created At</th>
        <th class="font-weight-bold">Updated At</th>
        <th class="font-weight-bold">Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $user)
    <tr>
        <td class="font-weight-bold">{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ ucfirst($user->user_type) }}</td>
        <td>{{ $user->create_user->name ?? 'N/A' }}</td>
        <td>{{ $user->update_user->name ?? 'N/A' }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at ?? 'N/A' }}</td>
        <td>
            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-flex justify-content-between aligin-items-center">
                @csrf
                @method('DELETE')
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6">Show</a>
                @if(auth()->user()->user_type == "admin")
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm font-weight-bold fs-6">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6">Delete</button>
                @endif
            </form>
        </td>
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no categories yet! <a href="{{ route('users.create') }}" class="fw-bold text-dark">Add categories from here</a>.</span>
    </div>
    @endforelse
    </tbody>
</table>
<nav class="m-b-30" aria-label="Page navigation example">
    <ul class="pagination justify-content-center pagination-primary">
        {!! $users->links('pagination::bootstrap-5') !!}
    </ul>
</nav>
@endsection
