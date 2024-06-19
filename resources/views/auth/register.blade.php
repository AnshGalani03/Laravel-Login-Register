@extends('layouts.auth')
@section('content')
    <!--authentication-->

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-5 col-xxl-8 mx-auto">
                <div class="card rounded-4">
                    <div class="card-body p-5">
                        {{-- <img src="assets/images/logo1.png" class="mb-4" width="145" alt=""> --}}
                        <h4 class="fw-bold">Reigister</h4>
                        <p class="mb-0">Enter your credentials to create your account</p>
                        @if (Session::has('error'))
                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                <div class="text-white">{{ Session::get('error') }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                                <div class="text-white">{{ Session::get('success') }}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="form-body my-4">
                            <form class="row g-3" method="POST" action="{{ route('register') }}">
                                @csrf
                                @method('post')
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputFirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="firstname"
                                        placeholder="Enter Your First Name">
                                    @error('firstname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputLastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="inputLastName" name="lastname"
                                        placeholder="Enter Your Last Name">
                                    @error('lastname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" name="email"
                                        placeholder="Enter Your Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="inputUsername" name="username"
                                        placeholder="Enter Username">
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword"
                                            name="password" placeholder="Enter Password">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control border-end-0" id="password_confirmation"
                                            name="password_confirmation" placeholder="Enter Confirm Password">
                                    </div>
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="inputPhoneNumber" name="phoneno"
                                        placeholder="Enter Your Phone Number">
                                    @error('phoneno')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputBirthDate" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="inputBirthDate" name="dob"
                                        placeholder="DOB">
                                    @error('dob')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputCollegeName" class="form-label">College Name</label>
                                    <input type="text" class="form-control" id="inputCollegeName" name="collegeName">
                                    @error('collegeName')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="inputEducation" class="form-label">Education</label>
                                    <input type="text" class="form-control" id="inputEducation" name="education">
                                    @error('education')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputGender" class="form-label">Gender</label>
                                    <div class="d-flex justify-content-start align-items-center gap-3 flex-wrap">
                                        <input type="radio" class="form-check-input" id="inputGender" name="gender"
                                            value="Male">Male
                                        <input type="radio" class="form-check-input" id="inputGender" name="gender"
                                            value="Female">Female
                                        <input type="radio" class="form-check-input" id="inputGender" name="gender"
                                            value="Other">Other
                                    </div>
                                    @error('gender')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputHobby" class="form-label">Hobby</label>
                                    <div class="d-flex justify-content-start align-items-center gap-3 flex-wrap">
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Playing">Playing
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Shopping">Shopping
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Eating">Eating
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Cokking">Cokking
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Singing">Singing
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Swimming">Swimming
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Working">Working
                                        <input type="checkbox" class="form-check-input" id="inputHobby" name="hobbies[]"
                                            value="Travelling">Travelling
                                    </div>
                                    @error('hobbies')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-start">
                                        <p class="mb-0">Already have an account? <a href="/login">Sign in
                                                here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>

    <!--authentication-->
@endsection
