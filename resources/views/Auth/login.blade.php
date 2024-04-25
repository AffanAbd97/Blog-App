
@extends('AuthLayout')

@section('content')
    <form action="{{ route('post.login') }}" method="POST">
        @csrf

        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="username">Username</label>
            <input type="text" id="username" class="form-control form-control-lg" name="username"
                placeholder="Enter a valid email address" />
            @error('username')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <!-- Password input -->
        <div class="form-outline mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" class="form-control form-control-lg" placeholder="Enter password"
                name="password" />
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember" />
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

        </div>

        <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
           
        </div>
    </form>
@endsection
