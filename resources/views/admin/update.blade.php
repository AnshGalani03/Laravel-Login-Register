@extends('layouts.app')
@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            @if (Session::has('error'))
                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                    <div class="text-white">{{ Session::get('error') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                    <div class="text-white">{{ Session::get('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <!--end breadcrumb-->

            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-9 col-xl-6 col-xxl-9 mx-auto">
                        <div class="card rounded-4">
                            <div class="card-body p-5">
                                {{-- <img src="assets/images/logo1.png" class="mb-4" width="145" alt=""> --}}
                                <h4 class="fw-bold">Update User</h4>
                                <div class="form-body my-4">
                                    <form class="row g-3" method="POST" enctype="multipart/form-data"
                                        action="{{ route('update-user', $users->id) }}">
                                        @csrf
                                        @method('put')
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputFirstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="inputFirstName" name="firstname"
                                                placeholder="Enter Your First Name" value="{{ $users->fname }}">
                                            @error('firstname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputLastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="inputLastName" name="lastname"
                                                placeholder="Enter Your Last Name" value="{{ $users->lname }}">
                                            @error('lastname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" name="email"
                                                placeholder="Enter Your Email" value="{{ $users->email }}" disabled>
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputUsername" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="inputUsername" name="username"
                                                placeholder="Enter Username" value="{{ $users->username }}" disabled>
                                            @error('username')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="inputPhoneNumber" name="phoneno"
                                                placeholder="Enter Your Phone Number" value="{{ $users->phone_no }}"
                                                disabled>

                                            @error('phoneno')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputBirthDate" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="inputBirthDate" name="dob"
                                                placeholder="DOB" value="{{ $users->dob }}">
                                            @error('dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputCollegeName" class="form-label">College Name</label>
                                            <input type="text" class="form-control" id="inputCollegeName"
                                                name="collegeName" value="{{ $users->college_name }}">
                                            @error('collegeName')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label for="inputEducation" class="form-label">Education</label>
                                            <input type="text" class="form-control" id="inputEducation" name="education"
                                                value="{{ $users->education }}">
                                            @error('education')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputGender" class="form-label">Gender</label>
                                            <div class="d-flex justify-content-start align-items-center gap-3 flex-wrap">
                                                <input type="radio" {{ $users->gender == 'Male' ? 'checked' : '' }}
                                                    class="form-check-input" id="inputGender" name="gender"
                                                    value="Male">Male
                                                <input type="radio" {{ $users->gender == 'Female' ? 'checked' : '' }}
                                                    class="form-check-input" id="inputGender" name="gender"
                                                    value="Female">Female
                                                <input type="radio" {{ $users->gender == 'Other' ? 'checked' : '' }}
                                                    class="form-check-input" id="inputGender" name="gender"
                                                    value="Other">Other
                                            </div>
                                            @error('gender')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputHobby" class="form-label">Hobby</label>
                                            @php
                                                $hobbies = json_decode($users->hobbies, true);
                                            @endphp
                                            <div class="d-flex justify-content-start align-items-center gap-3 flex-wrap">
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Playing"
                                                    {{ in_array('Playing', $hobbies) ? 'checked' : '' }}>Playing
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Shopping"
                                                    {{ in_array('Shopping', $hobbies) ? 'checked' : '' }}>Shopping
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Eating"
                                                    {{ in_array('Eating', $hobbies) ? 'checked' : '' }}>Eating
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Cokking"
                                                    {{ in_array('Cokking', $hobbies) ? 'checked' : '' }}>Cokking
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Singing"
                                                    {{ in_array('Singing', $hobbies) ? 'checked' : '' }}>Singing
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Swimming"
                                                    {{ in_array('Swimming', $hobbies) ? 'checked' : '' }}>Swimming
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Working"
                                                    {{ in_array('Working', $hobbies) ? 'checked' : '' }}>Working
                                                <input type="checkbox" class="form-check-input" id="inputHobby"
                                                    name="hobbies[]" value="Travelling"
                                                    {{ in_array('Travelling', $hobbies) ? 'checked' : '' }}>Travelling
                                            </div>
                                            @error('hobbies')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="input6" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" id="input6">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </div>
        </div>
    </main>
@endsection
