@extends('layouts.main')

@section('main')
    <div class="row justify-content-center pt-5 mt-5">
        <div class="col-lg-6">
            <div class="card p-3">
                <h2 class="text-center">Login Page</h2>
                @if (session()->has("succes"))
                    <div class="alert alert-succes alert-dismissible fade show" role="alert">
                        <strong>{{ session("succes") }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has("loginFail"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session("loginFail") }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" autocomplete="off" required class="form-control @error("name") is-invalid @enderror" placeholder="Your Username" id="inputUsername" name="username" value="{{ old("username") }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" autocomplete="off" required name="password" id="inputPassword5" placeholder="Your Password" class="form-control @error("password") is-invalid @enderror" aria-describedby="passwordHelpBlock">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <small class="d-block text-center mt-3">Don't have Account? <a href="/regist">Sign in</a></small>
            </div>
        </div>
    </div>
@endsection