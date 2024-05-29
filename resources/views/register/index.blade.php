@extends('layouts.main')

@section('main')
    <div class="row justify-content-center pt-5 mt-3">
        <div class="col-lg-6">
            <div class="card p-3">
                <h2 class="text-center">Regist Page</h2>
                <form action="/regist" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" autocomplete="off" class="form-control @error("name") is-invalid @enderror" placeholder="Your Name" id="inputName" name="name" value="{{ old("name") }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input type="text" autocomplete="off" class="form-control @error("username") is-invalid @enderror" placeholder="Your Username" id="inputUsername" name="username" value="{{ old("username") }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" autocomplete="off" class="form-control @error("email") is-invalid @enderror" placeholder="example@email.com" id="inputEmail" name="email" value="{{ old("email") }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputAddres" class="form-label">Addres</label>
                        <input type="text" autocomplete="off" class="form-control @error("addres") is-invalid @enderror" placeholder="Your Addres" id="inputAddres" name="addres" value="{{ old("addres") }}">
                        @error('addres')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="number" autocomplete="off" class="form-control @error("phone") is-invalid @enderror" placeholder="Your phone" id="inputphone" name="phone" value="{{ old("phone") }}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" autocomplete="off" name="password" id="inputPassword5" placeholder="Your Password" class="form-control @error("password") is-invalid @enderror" aria-describedby="passwordHelpBlock">
                        @error('password')
                        <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4 align-items-center">
                        <label for="inlineRadio" class="form-label me-3">Gender</label>
                        <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <small class="d-block text-center mt-3">Don't have Account? <a href="/login">Log in</a></small>
            </div>
        </div>
    </div>
@endsection