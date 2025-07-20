@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

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
                    <a href="#" class="list-group-item list-group-item-action">Profile Change</a>
                    <a href="#" class="list-group-item list-group-item-action">Profile Bio</a>
                    {{-- <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="tab"
                        data-bs-target="#profile-change-password">Password Change</a>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                        Password</button> --}}

                    {{-- <a href="javascript:void(0);" class="list-group-item list-group-item-action"
                        onclick="togglePasswordForm()">Password Change</a> --}}
                        
                        <a href="{{ route('profile.change') }}" class="list-group-item list-group-item-action">Password Change</a>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                    Edit Profile
                                </button>
                            </li>

                            {{-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li> --}}

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic">{{ $user->UserProfile->about }}</p>

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->UserProfile->address }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->UserProfile->phone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('profile.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img id="profileImagePreview"
                                                src="{{ asset(Auth::user()->ProfilePicture ?? 'uploads/admin-profile/default-img.png') }}"
                                                alt="Profile" style="max-width: 200px; border-radius: 10px;">

                                            <div class="pt-2">
                                                <!-- Profile Image Upload and Remove Buttons -->
                                                <label for="profileImage" class="btn btn-primary btn-sm text-light"
                                                    title="Upload new profile image">
                                                    <i class="bi bi-upload"></i>
                                                </label>
                                                <input type="file" id="profileImage" name="profile_image"
                                                    style="display: none;" onchange="uploadImage()">

                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteConfirmImage()" title="Remove my profile image">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about" style="height: 100px">{{ $user->UserProfile->about }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="{{ $user->UserProfile->address }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="{{ $user->UserProfile->phone }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="text" class="form-control" id="Twitter"
                                                value="{{ $user->UserProfile->twitter_profile }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="text" class="form-control" id="Facebook"
                                                value="{{ $user->UserProfile->facebook_profile }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="text" class="form-control" id="Instagram"
                                                value="{{ $user->UserProfile->instagram_profile }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                            Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin" type="text" class="form-control" id="Linkedin"
                                                value="{{ $user->UserProfile->linkedin_profile }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            {{-- <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form  -->
                                {{ route('profile.password.update', $user->id) }}
                                <form action="{{ route('profile.password.update', $user->id) }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="current_password" class="col-md-4">
                                            Current Password</label>
                                        <div class="col-md-8">
                                            <input name="current_password" type="password" class="form-control"
                                                id="current_password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password" class="form-control"
                                                id="new_password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                            New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="confirm_password" type="password" class="form-control"
                                                id="confirm_password">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div> --}}

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>
                {{-- password change form --}}
                <div class="card " id="passwordFormSection" style="display: none;">
                    <div class="card-header bg-primary text-light">
                        <h5 class="card-title">Change Password</h5>
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{ route('profile.password.update') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" name="new_password_confirmation" id="confirm_password"
                                class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </form> --}}

                        {{-- <form class="mt-3" action="{{ route('profile.password.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form> --}}
                    </div>

                </div>


            </div>
        </div>
    </section>
@endsection

<script>
    function uploadImage() {
        const fileInput = document.getElementById('profileImage');
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImage() {
        // Confirm before removing the image
        // You can customize this confirmation message as needed
        // sweetalert using alert box
        // Confirm before removing the image
        // You can customize this confirmation message as needed
        // sweetalert using alert box


        if (!confirm("Are you sure you want to remove your profile image?")) return;

        document.getElementById('profileImagePreview').src = '{{ asset('admin/assets/img/profile-img.jpg') }}';
        document.getElementById('profileImage').value = '';
    }


    //     function removeImage() {


    //         document.getElementById('profileImagePreview').src = '{{ asset('admin/assets/img/profile-img.jpg') }}';
    //         document.getElementById('profileImage').value = '';


    // Swal.fire({
    //     title: 'Are you sure?',
    //     text: "You want to remove your profile image!",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#d33',
    //     cancelButtonColor: '#3085d6',
    //     confirmButtonText: 'Yes, remove it!',
    //     cancelButtonText: 'Cancel'
    // }).then((result) => {
    //     if (result.isConfirmed) {

    //        .then(response => response.json())
    //         .then(data => {
    //             if (data.success) {
    //                 document.getElementById('profileImagePreview').src = '{{ asset('admin/assets/img/profile-img.jpg') }}';
    //                 document.getElementById('profileImage').value = '';

    //                 Swal.fire(
    //                     'Removed!',
    //                     'Your profile image has been removed.',
    //                     'success'
    //                 );
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Remove error:', error);
    //             Swal.fire('Error!', 'Something went wrong.', 'error');
    //         });
    //     }
    // });
    // }


    function deleteConfirmImage() {


        //  if (!confirm("Are you sure you want to remove your profile image?")) return;


        //         document.getElementById('profileImagePreview').src =
        //             '{{ asset('admin/assets/img/profile-img.jpg') }}';
        //         document.getElementById('profileImage').value = '';



        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Assuming you have a form with id 'delete-form' to handle the deletion
                // document.getElementById('delete-form').submit();
                // if (!confirm("Are you sure you want to remove your profile image?")) return;

                // if (!confirm("Are you sure you want to remove your profile image?")) return;


                document.getElementById('profileImagePreview').src =
                    '{{ asset('uploads/admin-profile/default-img.png') }}';
                document.getElementById('profileImage').value = '';
            }
        });
    }



    function togglePasswordForm() {
        const formSection = document.getElementById('passwordFormSection');
        formSection.style.display = formSection.style.display === 'none' ? 'block' : 'none';
    }
</script>
