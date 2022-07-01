<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frogot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/css/home.css')}}">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card"><br>
                <div class="">
                    <h3 class="text-center"><i class="fa fa-lock fa-4x"></i></h3>
                    <h2 class="text-center">Forgot Password?</h2>
                    <p  class="text-center">You can reset your password here.</p><br>
                    <form action="{{ route('reset.password.post') }}" method="POST" style="padding: 30px;">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">E-Mail Address</label>
                            <input type="text" id="email_address" class="form-control" required  placeholder="Enter your Email"  name="email" autofocus/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">New Password</label>
                            <input type="password" id="password" class="form-control" required  placeholder="Enter your password"  name="password" autofocus/>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Confirm Password</label>
                            <input type="password" id="password-confirm" class="form-control" required  placeholder="Password-Confirm"  name="password_confirmation" autofocus/>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="text-center pt-1 mb-5 pb-1 gradient-btn">
                            <button type="submit" class="">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>