@include('frontend.partial.header')
  <div class="contact-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- <h2>Contact Us</h2>
                    <p>Chain App Dev is an app landing page HTML5 template based on Bootstrap v5.1.3 CSS layout provided by TemplateMo, a great website to download free CSS templates.</p> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset('frontend/assets/images/contact.jpg')}}" style="margin-bottom: -157px;border-radius:100%" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Address</h5>
                        <h6 class="card-subtitle mb-2 text-muted">123 Street, New York, USA</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Call Now</h5>
                        <h6 class="card-subtitle mb-2 text-muted">+012 345 6789</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Mail Now</h5>
                        <h6 class="card-subtitle mb-2 text-muted">info@example.com</h6>
                    </div>
                </div>
            </div>
        </div>
  </div>
  @extends('frontend.partial.footer')