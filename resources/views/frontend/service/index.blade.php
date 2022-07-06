@include('frontend.partial.header')
<!-- section first -->

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h1>Services</h1>
                    <p>Chain App Dev is an app landing page HTML5 template based on Bootstrap v5.1.3 CSS layout provided by TemplateMo, a great website to download free CSS templates.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset('frontend/assets/images/services.png')}}" style="border-radius:100%" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- section second -->

<div class="container">
    <div class="row text-center">
        <div class="col-md-12" style="margin-top: 150px;">
            <h1>Our Services</h1>
            <p>Some text about who we are and what we do.</p>
            <p>Resize the browser window to see that this page is responsive by the way.</p>
        </div>
    </div>
</div>
<!-- section third -->

<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/airtel.jpg')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Airtel Bank Payment</h4>
                    <h5 class="card-title">$50</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/dth1.png')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">DTH Reacharge</h4>
                    <h5 class="card-title">$100</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/dth.jpg')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Mobile Reacharge</h4>
                    <h5 class="card-title">$65</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/nsdl.jpg')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">NSDL</h4>
                    <h5 class="card-title">$75</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section fourth -->

<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/aadhar.png')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">E-Aadhar</h4>
                    <h5 class="card-title">$150</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/uti.jpg')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Pancard Service</h4>
                    <h5 class="card-title">$80</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/online-ticket.jpg')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Online ticket confirm</h4>
                    <h5 class="card-title">$15</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/utiil.jpg')}}" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">UTIITSL</h4>
                    <h5 class="card-title">$120</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('frontend.partial.footer')