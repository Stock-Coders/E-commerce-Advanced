@extends('dashboard.layouts.master')
@section('title' , "Edit Category ($category->title)")
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        {{-- <h2 class="page-title">Edit Category</h2> --}}
        {{-- <p class="text-muted"></p> --}}
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title fs-2">Edit Category ({{ $category->title }})</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ route('subcategories.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('dashboard.pages.sub-categories.form')
                    <button type="submit" class="btn btn-primary btn-md px-4 font-weight-bold fs-5 border-2 shadow border-dark rounded" >Update</button>
                    <a href="{{ route('subcategories.index') }}" class="btn btn-dark btn-md px-2 font-weight-bold fs-5 shadow border-2 border-dark rounded" >Return to Categories</a>
                </form>
              </div> <!-- /.col -->
            </div>
          </div>
        </div> <!-- / .card -->
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection

