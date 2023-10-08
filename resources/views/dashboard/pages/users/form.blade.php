<div class="form-group mb-3">
    <label for="name">Name <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" value="{{ Request::old('name') ? Request::old('name') : $user->name }}" class="form-control @error('name') is-invalid @enderror">
    @error('name')
    <span class="invalid-feedback " role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="email">Email <span class="text-danger">*</span></label>
    <input type="email" name="email" id="email" value="{{ Request::old('email') ? Request::old('email') : $user->email }}" class="form-control @error('email') is-invalid @enderror">
    @error('email')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>


<div class="form-group mb-3">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ Request::old('phone') ? Request::old('phone') : $user->phone }}" class="form-control @error('phone') is-invalid @enderror">
    @error('phone')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

{{-- <div class="form-group mb-3">
    <label for="name">User Type <span class="text-danger">*</span></label>
    <select class="form-control @error('name') is-invalid @enderror" name="name" id="name">
        @if(\App\Models\User::count() > 0)
        <option value="" selected>-------- Select a user --------</option>
        @endif
        @foreach($users as $user)
        <option value="{{ $user->id }}" {{ $user->id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
        @endforeach
    </select>
    @error('name')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div> --}}

<div class="form-group mb-3">
    <label for="user_type">User Type <span class="text-danger">*</span></label>
    @if($user->user_type == 'admin' && auth()->user()->user_type == 'admin' && auth()->user()->email == 'admin@gmail.com')
        <input value="{{ ucfirst($user->user_type) }}" class="form-control" disabled>
    @else
        @if(auth()->user()->user_type == 'admin')
            <select class="form-control @error('user_type') is-invalid @enderror" name="user_type" id="user_type">
                <option value="">-------- Select a user type --------</option>
                <option value="customer" {{ $user->user_type == 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="moderator" {{ $user->user_type == 'moderator' ? 'selected' : '' }}>Moderator</option>
                <option value="admin" {{ $user->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        @else
            <input value="{{ ucfirst($user->user_type) }}" class="form-control" disabled>
        @endif
        @error('user_type')
            <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
        @enderror
    @endif
</div>

{{-- <div class="form-group mb-3">
    <label for="password">password <span class="text-danger">*</span></label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
    @error('password')
        <span class="invalid-feedback" role="alert"><strong class="text-danger">{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="password">Confirm password <span class="text-danger">*</span></label>
    <input type="password" name="password-confirm" id="password-confirm" class="form-control">
</div> --}}
