@extends('user.layouts.app', [])

@section('title', 'Register')

@section('content')
<div class="section section-nude">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                <div class="card card-register">
                    <h3 class="card-title">Membership</h3>
                    <form class="register-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <label>Name</label>
                        <input type="text" name="name" class="form-control no-border" placeholder="Name" value={{ old('name') }}>
                        @error('name')<p class="text-dark">{{ $message }}</p>@enderror
                        <label>Email</label>
                        <input type="email" name="email" class="form-control no-border" placeholder="Email" value={{ old('email') }}>
                        @error('email')<p class="text-dark">{{ $message }}</p>@enderror
                        <label>Password</label>
                        <input type="password" name="password" class="form-control no-border" placeholder="Password">
                        @error('password')<p class="text-dark">{{ $message }}</p>@enderror
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        @error('password_confirmation')<p class="text-dark">{{ $message }}</p>@enderror
                        <button class="btn btn-danger btn-block btn-round">Register</button>
                    </form>
                    <div class="forgot">
                        <a href="{{ route('login.form') }}" class="btn btn-link">Has already have an account? Login Here!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush
