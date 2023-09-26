@extends('dashboard.layouts.master')
@section('title' , 'Create Category')
@inject('category', 'App\Models\Category')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        {{-- <h2 class="page-title">Create Category</h2> --}}
        {{-- <p class="text-muted"></p> --}}
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title fs-2">Create Category</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    @include('dashboard.pages.categories.form')
                    <button type="submit" class="btn btn-success btn-md px-4 py-1 font-weight-bold fs-5 border-2 shadow border-dark rounded" >Submit</button>
                    <button type="reset" class="btn btn-secondary btn-md px-2 py-2 font-weight-bold fs-8 shadow border-2 border-dark rounded" >Reset</button>
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

