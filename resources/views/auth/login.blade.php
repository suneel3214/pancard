    @include('frontend.partial.header')
    @include('sweetalert::alert')

        <!-- login page  -->
        <section class="gradient-form" style="background-color: #ffffff;">
            <div class="container py-5 ">
                <div class="row d-flex justify-content-center align-items-center" style="margin-top: 60px;">
                <div class="col-xl-10">
                    <div class="card text-black" style="margin-bottom: 50px;border-radius: 3.3rem!important;">
                    <div class="row g-0">
                        <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                style="width: 185px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                              @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example11">Username</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}""
                                    placeholder="Phone number or email address" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example22">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Enter your password"  name="password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="text-center pt-1 mb-5 pb-1 gradient-btn">
                                    <button type="submit" type="submit">Log
                                    in</button>
                                    <a class="text-muted" href="#!">Forgot password?</a>
                                </div>

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">Don't have an account?</p>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register')}}" class="" style="color:#000;">Register</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">We are more than just a company</h4>
                            <p class="small mb-0" style="color:#fff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- login page end -->
@extends('frontend.partial.footer')
