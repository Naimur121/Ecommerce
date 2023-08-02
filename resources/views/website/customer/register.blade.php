@extends('website.master')
@section('title')
    Register
@endsection

@section('body')
    <div class="wrapper m-5">
        <div class="container-fluid">
            <div class="authentication-card">
                <div class="card shadow rounded-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                            <img src="{{ asset('admin') }}/login/assets/images/error/login-img.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body p-4 p-sm-5">
                                <h5 class="card-title">Sign Up</h5>
                                <p class="card-text mb-5">See your growth and get consulting support!</p>
                                <form class="form-body" method="POST" action="{{ route('customer.register') }}">
                                    @csrf
                                    <div class="d-grid">
                                        <a class="btn btn-white radius-30" href="javascript:;">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="me-2"
                                                    src="{{ asset('admin') }}/login/assets/images/icons/search.svg"
                                                    width="16" alt="">
                                                <span>Sign up with Google</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                        <hr>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12 ">
                                            <label for="inputName" class="form-label">Name</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <input type="text"
                                                    class="form-control radius-30 ps-5 @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" name="name" id="inputName"
                                                    placeholder="Enter Name">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </div>
                                                <input type="email"
                                                    class="form-control radius-30 ps-5 @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" name="email" id="inputEmailAddress"
                                                    placeholder="Email Address">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-lock-fill"></i>
                                                </div>
                                                <input type="password" class="form-control radius-30 ps-5 @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}" name="password"
                                                    id="inputChoosePassword" placeholder="Enter Password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="confirmInputChoosePassword5" class="form-label">Phone Number</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-lock-fill"></i>
                                                </div>
                                                <input type="text" class="form-control radius-30 ps-5 @error('mobile') is-invalid @enderror"
                                                    id="confirmInputChoosePassword5" value="{{ old('mobile') }}" name="mobile"
                                                    placeholder="Enter Phone Number" value="+0881">
                                                    @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-12">
                                            <label for="confirmInputChoosePassword5" class="form-label">Address</label>
                                            <div class="ms-auto position-relative">
                                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                    <i class="bi bi-lock-fill"></i>
                                                </div>
                                                <textarea type="text" class="form-control radius-30 ps-5"
                                                    id="confirmInputChoosePassword5" name="delivery"
                                                    placeholder="Address here.." ></textarea>
                                            </div>
                                        </div> --}}


                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                    required>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I Agree to
                                                    the Trems & Conditions</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary radius-30">Sign
                                                    in</button>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <p class="mb-0">Already have an account? <a
                                                    href="{{ route('customer.login') }}">Log In Here</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
