@extends('layouts.app')

@section('content')
    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">
                @include('_message')
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your username & password to login</p>
            </div>

            <form action="{{ url('login-post') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="email"
                            value="{{ old('email') }}">
                        <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="invalid-feedback">Please enter your password!</div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-12 mb-3">
                    <p class="small mb-0">Forgot Password? <a href="{{ route('forgot-account') }}">Forgot account</a></p>
                </div>
            </form>

            <div class="col-12">
                <div class="text-center">
                    <table class="table table-sm table-bordered mb-0">
                        <thead>
                            <tr class="bg-secondary text-white text-center align-middle">
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                             {{-- @foreach($user AS $userItem)
                            <tr>
                                <td class="text-center align-middle">{{ $userItem->email }}</td>
                                <td class="text-center align-middle">{{ $userItem->password }}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-sm btn-outline-primary px-2 admin">Apply</button>
                                   
                                    <button type="button" class="btn btn-sm btn-outline-primary px-2 admin" onclick="getRowName(this)">Apply</button>
                                     <button type="button" class="btn btn-sm btn-outline-primary px-2 admin {{ $userItem->email == 'admin@example.com' ? 'active' : '' }}" data-email="{{ $userItem->email }}" data-password="{{ $userItem->password }}">Apply</button> 
                                </td>
                            </tr>
                            @endforeach --}}

                            <tr>
                                <td class="text-center align-middle px-2">admin@mail.com</td>
                                <td class="text-center align-middle">12345678</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-sm btn-outline-primary px-2 admin">Apply</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">user@mail.com</td>
                                <td class="text-center align-middle">12345678</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-sm btn-outline-primary px-2 user">Apply</button>
                                </td>
                            </tr>


                           
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- JavaScript -->

    <script>


// function getRowName(button){
//                 const row = button.closest("tr");
//                 const email = row.cells[0].textContent;
//                 const password = row.cells[1].textContent;
//                 document.getElementById('email').value = email;
//                 document.getElementById('password').value = password;
//                 //alert("Selected Name: " + email);
//             }

        document.addEventListener('DOMContentLoaded', function() {
            function setLoginCredentials(email, password) {
                document.getElementById('email').value = email;
                document.getElementById('password').value = password;
            }
            
            document.querySelector('.admin').addEventListener('click', function() {
                setLoginCredentials('admin@mail.com', '12345678');
            });

            document.querySelector('.user').addEventListener('click', function() {
                setLoginCredentials('user@mail.com', '12345678');
            });

            document.querySelector('.purchase').addEventListener('click', function() {
                setLoginCredentials('purchase@example.com', '12345678');
            });

        });
    </script>

@endsection
