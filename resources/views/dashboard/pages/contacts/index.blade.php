@extends('dashboard.layouts.master')
@section('title' , 'Contacts')
@section('main-content')
<!-- Bordered table -->
@include('dashboard.pages.contacts.index-messages.messages')
<div class="row">
    <div class="col-md-12 grid-margin">
      {{-- <div class="d-flex justify-content-end flex-wrap">
      </div> --}}
    </div>
</div>
<table class="table table-hover table-bordered @if($contacts->count() == 0) d-none @endif">
    <thead class="thead-dark text-center">
    <tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Name</th>
        <th class="font-weight-bold">Phone</th>
        <th class="font-weight-bold">Email</th>
        <th class="font-weight-bold">Subject</th>
        <th class="font-weight-bold">Message</th>
        <th class="font-weight-bold">Customer/Guest</th>
        <th class="font-weight-bold">Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($contacts as $contact)
    <tr>
        <td class="font-weight-bold">{{ $loop->iteration }}</td>
        {{-- <td>
            <div class="progress progress-sm" style="height:3px">
                <div class="progress-bar" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td> --}}
        <td>{{ $contact->name }}</td>
        <td>{{ Str::words($contact->phone) ?? 'N/A' }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->subject }}</td>
        <td>{{ Str::words($contact->message, '5', '...') ?? 'N/A' }}</td>
        <td>{{ $contact->create_user->name ?? 'Guest' }}</td>
        <td>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" class="d-flex justify-content-between aligin-items-center">
                @csrf
                @method('DELETE')
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6">Show</a>
                @if(auth()->user()->user_type == "admin")
                <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6">Delete</button>
                @endif
            </form>
        </td>
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no contacts yet!</span>
    </div>
    @endforelse
    </tbody>
</table>
<nav class="m-b-30" aria-label="Page navigation example">
    <ul class="pagination justify-content-center pagination-primary">
        {!! $contacts->links('pagination::bootstrap-5') !!}
    </ul>
</nav>
@endsection
