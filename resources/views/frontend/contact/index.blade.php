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
                    <h1>Contact US</h1>
                    <p>Chain App Dev is an app landing page HTML5 template based on Bootstrap v5.1.3 CSS layout provided by TemplateMo, a great website to download free CSS templates.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset('frontend/assets/images/contactus.jpg')}}" style="border-radius:100%" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- section second -->
<div class="container mt-5">
  <div class="row">
      <div class="col-md-4 pb-2">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Address</h5>
                  <h6 class="card-subtitle mb-2 text-muted">123 Street, New York, USA</h6>
              </div>
          </div>
      </div>
      <div class="col-md-4 pb-2">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Call Now</h5>
                  <h6 class="card-subtitle mb-2 text-muted">+012 345 6789</h6>
              </div>
          </div>
      </div>
      <div class="col-md-4 pb-2">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Mail Now</h5>
                  <h6 class="card-subtitle mb-2 text-muted">info@example.com</h6>
              </div>
          </div>
      </div>
    </div>
</div>
<!-- section third -->
<div class="container mt-3">
  <h1 class="text-center">Contact Us Form</h1>
  <div class="row" style="padding: 0px 10px;">
    <div class="col-md-6 card mt-5">
        <form id="regForm" style="padding: 20px;">
          <!-- Name input -->
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input class="form-control"  id="name" name="name" type="text" placeholder="Name"  />
          </div>
          <!-- Email address input -->
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input class="form-control"  id="email" name="email" type="text" placeholder="Email Address"  />
          </div>
          <!-- Message input -->
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control"  name="message" id="message" type="text" placeholder="Message" style="height: 10rem;" ></textarea>
          </div>
          <!-- Form submit button -->
          <div class="text-center mb-3">
            <button class="btn btn-primary btn-lg" type="submit">Send</button>
          </div>
       </form>
    </div>
    <div class="col-md-6 card mt-5">
      <img src="{{asset('frontend/assets/images/email.png')}}" alt="" srcset="">
    </div>
  </div>
</div>
   
  @extends('frontend.partial.footer')