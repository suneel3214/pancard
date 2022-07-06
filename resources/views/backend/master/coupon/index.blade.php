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
                </span> Coupons
              </h3>
            </div>
              <div class="container">
                  <div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('coupons.store')}}" enctype="multipart/form-data" id="regForm">
                                    @csrf
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Coupon Type<span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control select-type">
                                      <option value="0">Select type</option>
                                      <option value="1">Physical Coupon</option>
                                      <option value="2"> Electronic Coupon</option>
                                    </select>
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Quantity <span class="text-danger">*</span></label>
                                    <input type="text" id="quantity" name="qty" placeholder="Quantity" class="form-control" />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn  btn-sm my-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div> 
                     <div class="col-md-4"> </div>
                  </div>
              </div>
          </div>
          <script>
            $(document).ready(function() {
                $("#regForm").validate({
                    rules: {
                        qty: {
                          required: true,
                          min: 2,
                        },
                        type: {
                          selectcheck: true
                        }
                    }
                });
                jQuery.validator.addMethod('selectcheck', function (value) {
                    return (value != '0');
                }, "Type is required");
            });
         </script>
@extends('partial.footer')

@endsection
