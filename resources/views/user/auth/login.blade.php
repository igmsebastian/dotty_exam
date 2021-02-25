@extends('user.layouts.app', [])

@section('title', 'Login')

@section('content')
<div class="section section-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 ml-auto mr-auto">
                <div class="card card-register">
                    <h3 class="card-title">Welcome</h3>
                    <form class="register-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <label>Email</label>
                        <input type="email" name="email" class="form-control no-border" placeholder="Email" value="{{ old('email') }}">
                        @error('email')<p class="text-dark">{{ $message }}</p>@enderror
                        <label>Password</label>
                        <input type="password" name="password" class="form-control no-border" placeholder="Password">
                        @error('password')<p class="text-dark">{{ $message }}</p>@enderror
                        <button type="submit" class="btn btn-danger btn-block btn-round">Login</button>
                    </form>
                    <div class="forgot">
                        <a href="{{ route('register.form') }}" class="btn btn-link">New User? Register Here!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush
