@extends('dashboard.layouts.master')
@section('title' , "Category ($category->title)")
@section('main-content')
<div class="container text-center my-3 mb-2 single-category">
    <div class="bg-dark text-light w-75 mx-auto
        shadow rounded p-5">
        <h2> {{$category->title ?? 'NULL'}}</h2>
        <p>{{$category->description ?? 'NULL'}}</p>
        <hr>
        <div class="">
            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success mx-1"><i class="fa-solid fa-edit p-1"></i> Edit</a>
                <button class="btn btn-danger mx-1" type="submit"><i class="fa-solid fa-trash-alt p-1"></i> Delete</button>
                <p class="mt-4">
                    <a href="{{ route('categories.index') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left p-1"></i> Return to Categories</a>
                    <a href="{{ /* route('categories.show', $category->category->id) */ '#' }}" class="btn btn-warning"><i class="fa-solid fa-network-wired p-1"></i> Show Related Categories</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

