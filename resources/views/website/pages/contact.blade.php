@extends('website.layouts.master')
@section('title' , 'Contact')
@section('main-content')
    <div class="site-wrap">
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home-ancor') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
                <p>
                    @if(session()->has('successful_contact'))
                    <p>
                        <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
                            {{ session()->get('successful_contact') }}

                        @elseif(session()->has('unsuccessful_contact'))
                        <p>
                            <div class="alert alert-danger text-center mx-auto" style="width: 90%; margin-top: 3%;">
                                {{ session()->get('unsuccessful_contact') }}
</div>
</p>
</div>
</p>
@endif
</p>
</div>
</div>
</div>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Get In Touch</h2>
</div>
    <div class="col-md-7">
            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{-- @if(!auth()->user()) --}}
                            <label for="name" class="text-black">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            {{-- @endif --}}
</div>
    {{-- <div class="col-md-6">
        <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="c_lname" name="c_lname">
</div> --}}
</div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                @enderror
</div>
</div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="subject" class="text-black">Subject <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject">
                @error('subject')
                    <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                @enderror
</div>
</div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="message" class="text-black">Message <span class="text-danger">*</span></label>
                <textarea name="message" id="message" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror"></textarea>
                @error('message')
                    <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
                @enderror
</div>
</div>
    <div class="form-group row">
        <div class="col-lg-12">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit">
</div>
</div>
</div>
</form>
</div>
    <div class="col-md-5 ml-auto">
        <div class="p-4 border mb-3">
            <span class="d-block text-primary h6 text-uppercase">New York</span>
                <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
</div>
    <div class="p-4 border mb-3">
        <span class="d-block text-primary h6 text-uppercase">London</span>
            <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
</div>
    <div class="p-4 border mb-3">
    <span class="d-block text-primary h6 text-uppercase">Canada</span>
        <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
