@extends('layouts.auth')
@section('content')
    <!--authentication-->

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                <div class="card rounded-4">
                    <div class="card-body p-5">
                        {{-- <img src="assets/images/logo1.png" class="mb-4" width="145" alt=""> --}}
                        <h4 class="fw-bold">Login</h4>
                        <p class="mb-0">Enter your credentials to login your account</p>
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
                            <form class="row g-3" method="POST" action="{{ route('login') }}">
                                @csrf
                                @method('post')
                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">Email/Username/Phone Number</label>
                                    <input type="text" class="form-control" id="inputEmailAddress"
                                        placeholder="Email/Username/Phone Number" name="login">
                                    @error('login')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword"
                                            placeholder="Enter Password" name="password">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-start">
                                        <p class="mb-0">Don't have an account yet? <a href="/register">Sign
                                                up here</a>
                                        </p>
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
