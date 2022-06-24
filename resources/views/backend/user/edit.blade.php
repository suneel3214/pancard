@extends('layouts.app')
@extends('partial.header')
@extends('partial.sidevar')

@section('content')
@include('sweetalert::alert')
<div class="main-panel" style="width:100% !important">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Edit User
              </h3>
              <nav aria-label="breadcrumb over-view">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Wallet Amount<i class="mdi mdi-wallet-travel icon-sm text-primary align-middle"></i><br>
                    <span><i class="fa-solid fa-brazilian-real-sign">&nbsp;{{ Auth::user()->points ? Auth::user()->points : '0' }}.00</i></span>
                  </li>
                </ul>
              </nav>
            </div>
              <div class='mb-3 text-end'>
              @if(in_array("Admin", Auth::user()->roles->toArray()))
              <a href="{{url('/admin/all_user/index')}}" class='btn  btn-sm my-btn'></i>Back</a>
              @else
              <a href="{{url('/admin/index')}}" class='btn  btn-sm my-btn'></i>Back</a>
              @endif
              </div><hr>
              <div class="container">
                  <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('admin.user.update',$user->id)}}" id="regForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-outline mb-4">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                    <label class="form-label" for="">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="{{$user->name}}" placeholder="Name" class="form-control" />
                                    </div>

                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Your Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" value="{{$user->email}}" placeholder="Email" class="form-control" />
                                    <small class="text-danger">@error('email'){{$message}}@enderror</small>
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" id="mobile" name="mobile" value="{{$user->mobile}}" placeholder="Mobile" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">State <span class="text-danger">*</span></label>
                                    <input type="text" id="state" name="state" value="{{$user->state}}" placeholder="State" class="form-control" />
                                    </div>
                                   <div class="form-outline mb-4">
                                    <label class="form-label" for="">Role <span class="text-danger">*</span></label>
                                    <select name="user_type" id="user_type" class="form-control select-type">
                                        <option value="">Select Role</option>
                                        @foreach($role as $roles)
                                        @if($user_id != $roles->id && $user_id <= $roles->id)
                                        <option value="{{$roles->id}}" @if($roles->id == $user->user_type) selected @endif>{{$roles->display_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn  btn-sm my-btn">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div> 
                     <div class="col-md-3"></div>
                  </div>
              </div>
          </div>
          <!-- content-wrapper ends -->

          <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    name: "required",
                    mobile: "required",
                    email: "required",
                    user_type:"required",
                    state:"required"

                }
            });
        });
    </script>
   
@extends('partial.footer')

@endsection
