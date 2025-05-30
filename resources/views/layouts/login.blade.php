@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card">
        <div class="text-center mb-4">
            <a href="#">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Logo" style="max-height: 60px;">
            </a>
            <h5 class="mt-3 text-muted">Welcome To System</h5>
        </div>

        {{-- Error Handling --}}
        @php
        $filteredErrors = collect($errors->all())->reject(function ($error) {
            return str_contains($error, 'Terlalu banyak percobaan login') || 
                str_contains($error, 'Too many login attempts') || 
                is_numeric($error);
        });
        @endphp

        {{-- Display General Errors --}}
        @if ($filteredErrors->isNotEmpty())
        <div class="alert alert-danger text-sm py-1 text-center">
            @foreach ($filteredErrors as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
        @endif

        {{-- Handle Lockout --}}
        @if ($errors->has('lockout_seconds'))
        @php
            $seconds = session('errors')->get('lockout_seconds')[0] ?? 0;
        @endphp
        <input type="number" name="getSecond" id="getSecond" value="{{ $seconds }}" hidden>
        <div class="alert alert-danger text-sm py-1 text-center" id="lockout-message">
            <span id="countdown-text"></span>
        </div>
        @endif

        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control text-uppercase"
                    value="{{ old('username') }}" required autofocus autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control text-uppercase"
                    required autocomplete="off">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary" id="login-btn">Sign In</button>
            </div>
        </form>
    </div>
</div>

{{-- Timer Script --}}
@if ($errors->has('lockout_seconds'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // let seconds = @json($seconds);
        let seconds = parseInt(document.getElementById('getSecond').value);
        const countdownText = document.getElementById('countdown-text');
        const loginBtn = document.getElementById('login-btn');

        if (countdownText && loginBtn) {
            loginBtn.disabled = true;

            function updateCountdown() {
                if (seconds <= 0) {
                    countdownText.textContent = 'Please try logging in again.';
                    loginBtn.disabled = false;
                } else {
                    countdownText.textContent = `Too many login attempts. Please try again in ${seconds} seconds.`;
                    seconds--;
                    setTimeout(updateCountdown, 1000);
                }
            }

            updateCountdown();
        } else {
            console.error("Countdown or Login button element not found!");
        }
    });
</script>
@endif
@endsection
