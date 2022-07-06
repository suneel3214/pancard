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
                    <h1>About Us</h1>
                    <p>Chain App Dev is an app landing page HTML5 template based on Bootstrap v5.1.3 CSS layout provided by TemplateMo, a great website to download free CSS templates.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset('frontend/assets/images/aboutus.jpg')}}" style="border-radius:100%" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12" style="margin-top: 150px;">
            <h1>About Us Page</h1>
            <p>Some text about who we are and what we do.</p>
            <p>Resize the browser window to see that this page is responsive by the way.</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/sargio.jpg')}}" height="280" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Director</h4>
                    <h5 class="card-title">Mr. Sargio</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/tokyo.png')}}" height="280" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">CEO</h4>
                    <h5 class="card-title">Miss. Tokyo</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/monika.jpg')}}" height="280" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Manager</h4>
                    <h5 class="card-title">Miss. Monika</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-2">
            <div class="card my-shadow">
                <img src="{{asset('frontend/assets/images/denver.jpg')}}" height="280" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Assistant</h4>
                    <h5 class="card-title">Mr. Denvar</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@extends('frontend.partial.footer')