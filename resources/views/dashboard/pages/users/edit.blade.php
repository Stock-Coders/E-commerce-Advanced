@extends('dashboard.layouts.master')
@if($user->id == auth()->user()->id)
    @section('title', "Edit Your Data")
@else
    @section('title', "Edit User ($user->name)")
@endif
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title fs-2">
                @if($user->id == auth()->user()->id)
                Edit Your Data
                @else
                Edit User (<span class="text-primary">{{ $user->name }}</span>)
                @endif
            </strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('dashboard.pages.users.form')
                    <button type="submit" class="btn btn-primary btn-md px-4 py-1 font-weight-bold fs-5 border-2 shadow border-dark rounded" >Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-dark btn-md px-2 py-2 font-weight-bold fs-8 shadow border-2 border-dark rounded" >Return to Users</a>
                    <a href="{{ url()->previous() }}" class="btn btn-light border-secondary">Go Back</a>
                </form>
              </div> <!-- /.col -->
            </div>
          </div>
        </div> <!-- / .card -->
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection

