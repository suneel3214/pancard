<!DOCTYPE html>
<html>
<head>
    <title>smartpancardservices.com</title>
    <style>
    	button{
            background: linear-gradient(to right, #da8cff, #9a55ff) !important;
    		color: #fff !important;
    		width: 150px;
    		height: 45px;
    		border: none;
    	}
    </style>
</head>
<body>
    <h1>Mail From Smart Pancard Services.........</h1>
    <h4>User Name:- <strong>{{ $data['name'] }}</strong></h4>
    <h4>Email:- <strong>{{ $data['email'] }}</strong></h4>
    <h4>Password:- <strong>{{ $data['password'] }}</strong></h4>
    <h4>Referal Code:- <strong>{{ $data['referal_code'] }}</strong></h4>

    @if($data['user_type'] == 2)
    <h4>Role:- <strong>Master Admin</strong></h4>
    @endif

    @if($data['user_type'] == 3)
    <h4>Role:- <strong>Master Distributer</strong></h4>
    @endif

    @if($data['user_type'] == 4)
    <h4>Role:- <strong>Distributer</strong></h4>
    @endif

    @if($data['user_type'] == 5)
    <h4>Role:- <strong>Retailer</strong></h4>
    @endif

    <button class="btn btn-success btn-sm">
       <a href="{{ url('http://pan.hithere.co.nz/') }}" style='color: #fff;text-decoration: none;' class="">Go to Website</a>
    </button>
    <br><br>
    <p>Thank you</p><br>
    <p>Please don't reply..</p>

</body>
</html>