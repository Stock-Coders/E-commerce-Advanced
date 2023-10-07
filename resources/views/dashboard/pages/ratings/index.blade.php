@extends('dashboard.layouts.master')
@section('title' , 'Ratings')
@section('main-content')
<!-- Bordered table -->
@include('dashboard.pages.ratings.index-messages.messages')
<table class="table table-hover table-bordered @if($ratings->count() == 0) d-none @endif">
    <thead class="thead-dark text-center">
    <tr>
        <th class="font-weight-bold">#</th>
        <th class="font-weight-bold">Product</th>
        <th class="font-weight-bold">Description</th>
        <th class="font-weight-bold">Rating</th>
        <th class="font-weight-bold">Customer</th>
        <th class="font-weight-bold">Created At</th>
        <th class="font-weight-bold">Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($ratings as $rating)
    <tr>
        <td class="font-weight-bold">{{ $loop->iteration }}</td>
        <td>{{ $rating->product->title }}</td>
        <td>{{ Str::words($rating->product->description, '5', '...') ?? 'N/A' }}</td>
        <td>
            @php
                if($rating->rating_level == 1)     {$rating_level_string = "Poor";}
                elseif($rating->rating_level == 2) {$rating_level_string = "Average";}
                elseif($rating->rating_level == 3) {$rating_level_string = "Good";}
                elseif($rating->rating_level == 4) {$rating_level_string = "Very Good";}
                else                               {$rating_level_string = "Excellent";}
            @endphp
            {{ $rating_level_string }}
        </td>
        <td>{{ $rating->customer->name }}</td>
        <td>{{ $rating->created_at }}</td>
        <td class="text-light ">
            <div class="d-flex justify-content-center aligin-items-center">
                <form action="{{ route('ratings.destroy', $rating->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('ratings.show', $rating->id) }}" class="btn btn-warning btn-sm font-weight-bold fs-6">Show</a>
                    @if(auth()->user()->user_type == "admin")
                    <button type="submit" class="btn btn-danger btn-sm font-weight-bold fs-6">Delete</button>
                    @endif
                </form>
            </div>
        </td>
    </tr>
    @empty
    <div class="alert alert-danger text-center my-5 w-75 mx-auto">
        <span class="h6">There are no ratings for products yet!</span>
    </div>
    @endforelse
    </tbody>
</table>
<nav class="m-b-30" aria-label="Page navigation example">
    <ul class="pagination justify-content-center pagination-primary">
        {!! $ratings->links('pagination::bootstrap-5') !!}
    </ul>
</nav>
@endsection
