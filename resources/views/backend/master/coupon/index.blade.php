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
              <!-- <nav aria-label="breadcrumb over-view">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Wallet Amount<i class="mdi mdi-wallet-travel icon-sm text-primary align-middle"></i><br>
                    <span><i class="fa-solid fa-brazilian-real-sign">&nbsp;{{ Auth::user()->points ? Auth::user()->points : '0' }}.00</i></span>
                  </li>
                </ul>
              </nav> -->
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
                                    <label class="form-label" for="">PSA ID <span class="text-danger">*</span></label>
                                    <input type="text" name="psa_id" id="psa_id" placeholder="PSA ID" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Type<span class="text-danger">*</span></label>
                                    <input type="text" name="type" placeholder="type" id="type" class="form-control" />
                                    </div>
                                    <div class="form-outline mb-4">
                                    <label class="form-label" for="">Quantity <span class="text-danger">*</span></label>
                                    <input type="text" id="quantity" name="quantity" placeholder="Quantity" class="form-control" />
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
                        psa_id: "required",
                        type: "required",
                        quantity: "required",
                    }
                });
            });
         </script>
@extends('partial.footer')

@endsection
