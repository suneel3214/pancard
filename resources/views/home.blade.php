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
                  <span class="my-text-shadow">PSA ID :  {{ Auth::user()->username ? Auth::user()->username : '' }}</span><br>
                  <span></span>Wallet Amount<i class="mdi mdi-wallet-travel icon-sm text-primary align-middle"></i><br>
                  <span><i class="fa-solid fa-brazilian-real-sign">&nbsp;{{ Auth::user()->points ? Auth::user()->points : '0' }}.00</i></span>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service1 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                    <h3 class="font-weight-normal mb-3">PSA Login
                    <i class="fa fa-location-arrow" style="color:white"></i>
                    </h3>
                    <a href="https://www.psaonline.utiitsl.com/psaonline/showLogin" target="_blank" class="text-d"><h6 class="mb-5 text-white">UTIITSL</h6></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service2 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                      <h3 class="font-weight-normal mb-3">COUPON
                      <i class="fa-solid fa-qrcode" style="color:white"></i>
                      </h3>
                      <a href="{{route('coupons.index')}}" class="text-d"><h6 class="mb-5 text-white">Purchase</h6></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service3 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                      <h3 class="font-weight-normal mb-3">NSDL Fingerprint
                      <i class="fa-solid fa-fingerprint" style="color:white"></i>
                      </h3>
                      <a href="#" class="text-d"><h6 class="mb-5 text-white">NSDL Pan Card with Finger Print</h6></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card  bg-gradient-service1 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Total user's <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{$count}}</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service2 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Monthly Records <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">45,6334</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-service3 card-img-holder text-white card-h shadow-lg">
                  <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">95,5741</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
@extends('partial.footer')

@endsection
