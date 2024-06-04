@extends('layouts.main')

@section('main')
<div class="pagetitle">
        <h1>Profile</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    @if (session()->has("succes"))
        <div class="position-fixed bottom-0 end-0 z-1">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session("succes") }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <section class="section profile">
        <div class="row">
        <div class="col-xl-4">

            <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="/assets/img/default-profile.jpg" alt="Profile" class="rounded-circle">
                <h2>{{ auth()->user()->username }}</h2>
                @can("admin")
                    <h3 class="text-success">{{ auth()->user()->role }}</h3>
                @else
                    <h3>{{ auth()->user()->role }}</h3>
                @endcan
                <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link px-2 active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link px-2" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                    </li>
                </ul>
                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">About</h5>
                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                        <h5 class="card-title">Profile Details</h5>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">Username</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->username }}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">Job</div>
                        <div class="col-lg-9 col-md-8">Web Designer</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">Country</div>
                        <div class="col-lg-9 col-md-8">USA</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">Address</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->addres }}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">Phone</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->phone }}</div>
                        </div>

                        <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                        </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        <!-- Profile Edit Form -->
                        <form method="POST" action="/dashboard/user/profile/{{ auth()->user()->id }}">
                            @method("put")
                            @csrf
                            {{-- <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                <div class="col-md-8 col-lg-9">
                                <img src="assets/img/profile-img.jpg" alt="Profile">
                                <div class="pt-2">
                                    <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                </div>
                                </div>
                            </div> --}}

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                <div class="col-md-8 col-lg-9">
                                <input name="name" type="text" class="form-control @error("name") is-invalid @enderror" id="name" value="{{ old("name", auth()->user()->name) }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                <div class="col-md-8 col-lg-9">
                                <input name="username" type="text" class="form-control @error("username") is-invalid @enderror" id="username" value="{{ auth()->user()->username }}">
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                                <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                <div class="col-md-8 col-lg-9">
                                <textarea name="about" class="form-control @error("name") is-invalid @enderror" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                </div>
                            </div> --}}

                            <div class="row mb-3">
                                <label for="addres" class="col-md-4 col-lg-3 col-form-label">Addres</label>
                                <div class="col-md-8 col-lg-9">
                                <input name="addres" type="text" class="form-control @error("addres") is-invalid @enderror" id="addres" value="{{ auth()->user()->addres }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                <div class="col-md-8 col-lg-9">
                                <input name="phone" type="number" class="form-control @error("phone") is-invalid @enderror" id="phone" value="{{ auth()->user()->phone }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control @error("email") is-invalid @enderror" id="email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form>

                    <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                    </form><!-- End Change Password Form -->

                </div>

                </div><!-- End Bordered Tabs -->

            </div>
            </div>

        </div>
        </div>
    </section>
@endsection