@extends('dashboard.layouts.master')
@section('title' , 'Create Sub-Category')
@section('main-content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        {{-- <h2 class="page-title">Create Sub-Category</h2> --}}
        {{-- <p class="text-muted"></p> --}}
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title fs-2">Create Sub-Category</strong>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <form action="{{ route('subcategories.store') }}" method="post">
                    @csrf
                    @include('dashboard.pages.sub-categories.form')
                    <button type="submit" class="btn btn-success btn-md px-4 font-weight-bold fs-5 border-2 shadow border-dark rounded" >Submit</button>
                    <button type="reset" class="btn btn-secondary btn-md px-2 font-weight-bold fs-5 shadow border-2 border-dark rounded" >Reset</button>
                </form>
              </div> <!-- /.col -->
            </div>
          </div>
        </div> <!-- / .card -->
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection

