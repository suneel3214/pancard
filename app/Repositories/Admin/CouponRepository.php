<?php
namespace App\Repositories\Admin;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use App\Helper\Curlhelpers;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class CouponRepository.
 */
class CouponRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */

   public function createCoupon($request)
   {
        $data = $request->all();
        // dd($data);
        $dataApi = [
            "api_key"=>'e5e27c-f8edec-6bbfa6-e5e996-51bf0d',
            'vle_id'=>$data['psa_id'],
            "type"=>  $data['type'],
            "qty"=>$data['quantity']
        ];
        $api = Curlhelpers::coupon_request($dataApi);
        // dd($api);
        if($api['status'] == "SUCCESS"){
            Alert::success('SUCCESS', 'Coupon Purchase Successfully..');
            return redirect()->back();
        }else
        Alert::success('FAILED', 'Insufficient Balance Please Add Your Wallet Amount..');
        return redirect()->back();
   }

}
