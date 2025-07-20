@extends('admin.layouts.app')

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        {{-- Display the user's profile image --}}

                        <img class="img-fluid"
                            src="{{ asset(Auth::user()->ProfilePicture ?? 'uploads/admin-profile/default-img.png') }}"
                            alt="Profile" style="max-width: 200px; height: 100px; border-radius: 10px;">

                        {{-- <img src="{{ asset('admin') }}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}

                        <h2>Hi!,{{ $user->name }}</h2>
                        <h3>{{ $user->email }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>
                </div>

                <div class="list-group">
                    <a href="{{ route('user.profile') }}"
                        class="list-group-item list-group-item-action {{ Route::is('user.profile') ? 'active' : '' }}">Profile
                        Change</a>
                    <a href="#" class="list-group-item list-group-item-action">Profile Bio</a>
                    <a href="javascript:void(0);"
                        class="list-group-item list-group-item-action {{ Route::is('profile.change') ? 'active' : '' }}"
                        onclick="togglePasswordForm()">Password Change</a>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-header ">
                        <h4 class="pt-2">Change Password</h4>
                    </div>
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->

                        <div class="tab-content">
                            <div class="tab-pane fade show active profile-change-password" id="profile-change-password">
                                <form method="POST" action="{{ route('profile.password.update') }}" class="row g-3">
                                    @csrf
                                    <div class="col-12">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password" value="{{ old('current_password') }}">
                                        @if ($errors->has('current_password'))
                                            <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" name="new_password" class="form-control" id="new_password"
                                            value="{{ old('new_password') }}">
                                        @if ($errors->has('new_password'))
                                            <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control"
                                            id="confirm_password" value="{{old('confirm_password')}}">
                                        @if ($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
