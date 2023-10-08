@extends('dashboard.layouts.master')
@section('title' , "User ($user->name)")
@section('main-content')
<div class="container text-center my-3 mb-2 single-category">
    <div class="bg-dark text-light w-75 mx-auto
        shadow rounded p-5">
        <h2> {{$user->name ?? 'N/A'}}</h2>
        <p>{{$user->email ?? 'N/A'}}</p>
        <hr>
        <div class="">
            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success mx-1"><i class="fa-solid fa-edit p-1"></i> Edit</a>
                <button class="btn btn-danger mx-1" type="submit"><i class="fa-solid fa-trash-alt p-1"></i> Delete</button>
                <p class="mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left p-1"></i> Return to Users</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

