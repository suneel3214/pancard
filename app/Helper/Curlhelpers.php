<?php
  namespace App\Helper;
  use Illuminate\Support\Facades\Http;
  class Curlhelpers
  {
    static function vle_create($data)
    {    
        // dd($data);
        $apiURL = 'https://mgopanmitra.com/api/add_vle.php?api_key=e5e27c-f8edec-6bbfa6-e5e996-51bf0d&vle_id='
        .$data['vle_id'].'&vle_name='.$data['vle_name'].'&vle_mob='.$data['vle_mob'].'&vle_email='
        .$data['vle_email'].'&vle_shop='.$data['vle_shop'].'&vle_loc='
        .$data['vle_loc'].'&vle_state='.$data['vle_state'].'&vle_pin='.
        $data['vle_pin'].'&vle_uid='.$data['vle_uid'].'&vle_pan='.$data['vle_pan'].'';
        // dd($apiURL);
        $response = Http::get($apiURL);
  
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true); 
        return $responseBody;
    }

    static function coupon_request($data)
    {    
        // dd($data);
        $couponApiURL = 'https://mgopanmitra.com/api/coupon_req.php?api_key=e5e27c-f8edec-6bbfa6-e5e996-51bf0d&vle_id='
        .$data['vle_id'].'&type='.$data['type'].'&qty='.$data['qty'].'';
        // dd($couponApiURL);
        $response = Http::get($couponApiURL);
  
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true); 
        return $responseBody;
       
    }

    static function vle_password_reset()
    {    
        // dd($data);
        $resetApiURL = 'https://mgopanmitra.com/api/pass_reset.php?api_key=e5e27c-f8edec-6bbfa6-e5e996-51bf0d&vle_id='
        .$data['vle_id'].'';
        // dd($resetApiURL);
        $response = Http::get($resetApiURL);
  
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true); 
        return $responseBody;
       
    }
  }

  ?>
 