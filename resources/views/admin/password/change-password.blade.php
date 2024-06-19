@extends('layouts.app')
@section('content')
    <!--start main wrapper-->
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

            <div class="col-12 col-md-8 col-lg-8 col-xl-5 col-xxl-8 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Change Password</h5>
                        <form action="{{ route('change-password') }}" class="row g-3" method="POST">
                            @csrf
                            @method('post')
                            <div class="col-md-12">
                                <label for="input1" class="form-label">Old Password</label>
                                <input type="password" name="current_password" class="form-control" id="input1"
                                    placeholder="Old Password">
                                @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="inputChoosePassword" class="form-label">New Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control border-end-0" id="inputChoosePassword"
                                        name="new_password" placeholder="Enter Password">
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                                            class="bi bi-eye-slash-fill"></i></a>
                                </div>
                                @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="input3" class="form-label">Confirm Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" id="input3"
                                    placeholder="Confirmed Password">
                                @error('new_password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                                    <button type="reset" class="btn btn-light px-4">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
