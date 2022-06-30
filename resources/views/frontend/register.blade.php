<!-- @extends('layouts.app') -->
@include('frontend.partial.header')
<!-- @section('content') -->
<section  style="background-color: #ffffff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: 60px;">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-12 col-lg-12 d-flex align-items-center"  style="background-image: url(/frontend/assets/images/pro-table-top.png);background-repeat: no-repeat;background-size: cover;">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="{{ route('user.create') }}" id="regForm">
                    @csrf
                  <div class="text-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0 text-center"><img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo"></span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Register your account</h5>
                   <div class="row">
                       <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">Name</label>
                            <input type="text" id="name" placeholder="Name" name="name"  value="{{ old('name') }}" class="form-control" />
                            <small class="text-danger">@error('name'){{$message}}@enderror</small>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">Referal Code</label>
                            <input  placeholder="Referal Code" id="referal_code" type="text" class="form-control" name="referal_code" />
                            <small class="text-danger">@error('referal_code'){{$message}}@enderror</small>
                          </div>
                         
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-6">
                          <div class="form-outline mb-4">
                              <label class="form-label" for="">Mobile</label>
                              <input type="number" onKeyPress="if(this.value.length==12) return false;" id="mobile" placeholder="Mobile" name="mobile" class="form-control"  />
                              <small class="text-danger">@error('mobile'){{$message}}@enderror</small>
                          </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-outline mb-4">
                            <label class="form-label" for="">Email address</label>
                            <input type="email" id="email"  class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email" />
                            <small class="text-danger">@error('email'){{$message}}@enderror</small>
                          </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-6">
                          <div class="form-outline mb-4">
                              <label class="form-label" for="">Password</label>
                              <input  placeholder="Password" id="password" type="password" class="form-control" name="password" />
                              <small class="text-danger">@error('password'){{$message}}@enderror</small>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">Confirm Password</label>
                            <input  placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" />
                          </div>
                       </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">Pancard Number<span class="text-danger">*</span></label>
                            <input type="text" id="pan_no" name="pan_no" placeholder="Pancard number" class="form-control" />
                            <small class="text-danger">@error('pan_no'){{$message}}@enderror</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">Aadhar Number <span class="text-danger">*</span></label>
                            <input type="text" id="aadhar_no" name="aadhar_no" onKeyPress="if(this.value.length==12) return false;" placeholder="Aadhar Number" class="form-control" />
                            <small class="text-danger">@error('aadhar_no'){{$message}}@enderror</small>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">Shop Name<span class="text-danger">*</span></label>
                            <input type="text" id="shop_name" name="shop_name" placeholder="Shop name" class="form-control" />
                            <small class="text-danger">@error('shop_name'){{$message}}@enderror</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">District <span class="text-danger">*</span></label>
                            <input type="text" id="district" name="district" placeholder="District" class="form-control" />
                            <small class="text-danger">@error('district'){{$message}}@enderror</small>
                          </div>
                        </div>
                    </div>
                   <div class="row">
                       <div class="col-md-6">
                          <div class="form-outline mb-4">
                            <label class="form-label" for="">User type</label>
                            <select name="user_type" class="form-control" id="user_type">
                                <option value="">Select User Type</option>
                                <option value="5">Retailer</option>
                                <option value="4">Distributer</option>
                                <option value="3">Master Distributer</option>
                            </select>
                            <small class="text-danger">@error('user_type'){{$message}}@enderror</small>
                          </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-outline mb-4">
                            <label class="form-label" for="">State</label>
                            <select name="state_id" class="form-control" id="state_id">
                                <option value="">Select User Type</option>
                                @if(isset($state))
                                @foreach($state as $states)
                                <option value="{{$states->id}}">{{$states->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <small class="text-danger">@error('state_id'){{$message}}@enderror</small>
                          </div>
                       </div>
                   </div>
                  
                  <div class="pt-1 mb-4 gradient-btn text-center">
                    <button class="" type="submit">Register</button>
                  </div>
                  <div class="d-flex pb-4 align-items-center justify-content-center">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <a href="{{ url('/login')}}" class="" style="color:#000;">Login here</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-center">
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@extends('frontend.partial.footer')
