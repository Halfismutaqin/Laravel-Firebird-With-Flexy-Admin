@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="logo-container">
            <a href="#">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Logo">
            </a>
        </div>
        
        <div class="row">
            <span class="login-title text-center mb-2 py-2 text-sm">
                &emsp;<small>Welcome To System</small>&emsp;
            </span>
        </div>

        <div class="row m-auto">
            @if ($errors->any())
                <div class="alert alert-danger text-danger font-italic text-center m-auto my-0 pb-1">
                    <strong>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </strong>
                </div>
            @endif
        </div>
        
        <hr>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control text-uppercase" value="{{ old('username') }}" required autofocus>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control text-uppercase" required>
                </div>
            </div>

            <div class="row">
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
            </div>
            
            <div class="row">
                <button type="submit" class="login-btn">Sign In</button>
            </div>
        </form>
    </div>
</div>
@endsection