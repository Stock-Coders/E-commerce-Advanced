@extends('dashboard.layouts.master')
@section('title' , "Contact ID ($contact->id)")
@section('main-content')
<div class="container text-center my-3 mb-2 single-category">
    <div class="bg-dark text-light w-75 mx-auto
        shadow rounded p-5">
        <h2>ID: {{ $contact->id }}</h2>
        <p><strong class="text-white">Name: </strong> <span>{{ $contact->name }}</span></p>
        <p><strong class="text-white">Phone: </strong><span>{{ $contact->phone ?? 'N/A' }}</span></p>
        <p><strong class="text-white">Email: </strong><span>{{ $contact->email }}</span></p>
        <p><strong class="text-white">Subject: </strong><span>{{ $contact->subject }}</span></p>
        <p><strong class="text-white">Message: </strong><span>{{ $contact->message }}</span></p>
        <p><strong class="text-white">User: </strong><span>{{ $contact->create_user->name ?? 'Guest' }}</span></p>
        <hr>
        <div class="">
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mx-1" type="submit"><i class="fa-solid fa-trash-alt p-1"></i> Delete</button>
                <p class="mt-4">
                    <a href="{{ route('contacts.index') }}" class="btn btn-info"><i class="fa-solid fa-arrow-left p-1"></i> Return to Contacts</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

