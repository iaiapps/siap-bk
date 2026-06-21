@extends('layouts.loginapp')

@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="{{ route('home') }}">{{ config('app.name', 'SIAP BK') }}</a>
            </div>
            <h1 class="auth-title">Masuk.</h1>
            <p class="auth-subtitle mb-5">Masuk menggunakan data yang telah didaftarkan.</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email"
                        class="form-control form-control-xl @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password"
                        class="form-control form-control-xl @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" required autocomplete="current-password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-gray-600" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                    {{ __('Login') }}
                </button>
            </form>

            @if (Route::has('password.request'))
                <div class="text-center mt-5 text-lg fs-4">
                    <p><a class="font-bold" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p>
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
    </div>
</div>
@endsection
