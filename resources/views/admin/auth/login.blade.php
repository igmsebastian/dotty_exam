@extends('admin.layouts.auth', [])

@section('title', 'Login')

@section('content')
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="red" data-image="{{ asset('dashboard') }}/img/background/background-3.jpg">
    <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header">
                                    <h3 class="card-title">Login</h3>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" placeholder="Enter Username" class="form-control input-no-border" value="{{ old('username') }}">
                                        @error('username')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Password" class="form-control input-no-border">
                                        @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Let's go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
