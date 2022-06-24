@extends('layouts.app')
@extends('partial.header')
@extends('partial.sidevar')

@section('content')
      
<div class="main-panel" style="width:100% !important">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                  <span class="my-text-shadow">Help Line Number ?  {{$data->creates ? $data->creates->mobile : ''}}</span><br>
                  <span></span>Wallet Amount<i class="mdi mdi-wallet-travel icon-sm text-primary align-middle"></i><br>
                  <span><i class="fa-solid fa-brazilian-real-sign">&nbsp;{{ Auth::user()->points ? Auth::user()->points : '0' }}.00</i></span>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Weekly Records <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">$ 15,0000</h2>
                    <h6 class="card-text">Increased by 60%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Monthly Records <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">45,6334</h2>
                    <h6 class="card-text">Decreased by 10%</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">95,5741</h2>
                    <h6 class="card-text">Increased by 5%</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service1 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                    <!-- <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" /> -->
                    <h3 class="font-weight-normal mb-3">Mobile
                    <i class="fas fa-mobile-alt" style="color:white"></i>
                    </h3>
                    <a href="#" class="text-d"><h6 class="mb-5 text-white">Recharge</h6></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service2 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                    <!-- <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" /> -->
                      <h3 class="font-weight-normal mb-3">UTI
                      <i class="fa fa-location-arrow" style="color:white"></i>
                      </h3>
                      <a href="#" class="text-d"><h6 class="mb-5 text-white">Infrastructure Technology And Services</h6></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service3 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                    <!-- <img src="{{asset('backend/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" /> -->
                      <h3 class="font-weight-normal mb-3">NSDL Fingerprint
                      <i class="fa fa-location-arrow" style="color:white"></i>
                      </h3>
                      <a href="#" class="text-d"><h6 class="mb-5 text-white">NSDL Pan Card with Finger Print</h6></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
@extends('partial.footer')

@endsection
