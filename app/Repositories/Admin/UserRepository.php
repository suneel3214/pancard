<?php

namespace App\Repositories\Admin;
use App\Models\User;
use App\Models\Role;
use Auth;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\MyTestMail;
/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */

    public function AllUser()
    {
        $data = User::with('roles','creates')->orderBy('id', 'desc')->paginate(20);

        $data = User::with('roles','creates')->orderBy('id', 'desc')->select('*')->where('id', '!=', Auth::id())->paginate(20);

        if(Auth::check()){
            return $data;
        }
        else{
            return $data;
        }
    }

    public function getAllUser()
    {
        $data = User::with('roles')->orderBy('id', 'desc')->paginate(20);

        $data = User::with('roles')->orderBy('id', 'desc')->select('*')->where('id', '!=', Auth::id())->paginate(20);

        if(Auth::check()){
            return $data;
        }
        else{
            return $data;
        }
    }

    public function getRole(){
        $role = Role::all();
        $role = Role::select('*')->where('id', '!=', Auth::id())->get();
        if(Auth::check()){
            return $role;
        }
        else{
            return $role;
        }
    }

    public function generateUniqueCode(){  
        $lastRecoed = User::orderBy('id','DESC')->first();        
        $code = random_int(1, 999999).''.$lastRecoed->id+1;
        return $code;
    }

    public function userStore($request){
        $generateCode = 'PCS';
		$data = $request->all();
        // dd($data);
        $data['referal_code'] = $this->generateUniqueCode();
        Mail::to($request->email)->send(new MyTestMail($data));
        $data['password'] = Hash::make($request->password);
        $data['created_by'] = Auth::user()->id;
        $data['username'] = $generateCode.$request->mobile;
        // dd($data);
        $dataApi = [
            "api_key"=>'e5e27c-f8edec-6bbfa6-e5e996-51bf0d',
            'vle_id'=>$data['username'],
            "vle_name"=>  $data['name'],
            "vle_mob"=>$data['mobile'],
            "vle_email"=>$data['email'],
            "vle_shop"=> $data['shop_name'],
            "vle_loc"=>$data['district'],
            "vle_state"=>(int)$data['state_id'],
            "vle_pan"=>$data['pan_no'],
            "vle_uid"=>$data['aadhar_no'],
            "vle_pin"=>$request->password
        ];
             
        $url = 'https://mgopanmitra.com/api/add_vle.php?api_key=e5e27c-f8edec-6bbfa6-e5e996-51bf0d&vle_id='.$data['username'].'&vle_name='.$data['name'].'&vle_mob='.$data['mobile'].'&vle_email='.$data['email'].'&vle_shop='.$data['shop_name'].'&vle_loc='.$data['district'].'&vle_state='.$data['state_id'].'&vle_pin='.$request->password.'&vle_uid='.$data['aadhar_no'].'&vle_pan='.$data['pan_no'].'';
 
        // Initialize a CURL session.
        $ch = curl_init();

        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);

        $result = curl_exec($ch);

        dd($result);
        
        // $curl = curl_init();
        // curl_setopt_array($curl,
        // array(
        // CURLOPT_URL =>
        // "https://mgopanmitra.com/api/add_vle.php",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => "",
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION
        // => true,
        // CURLOPT_HTTP_VERSION =>
        // CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => "GET",
        // CURLOPT_POSTFIELDS => $dataApi ));
        // $response =
        // curl_exec($curl);
        // curl_close($curl);
        // dd($response);
		$user = User::create($data);

       return redirect()->back();
		
	}

    public function userRegister($request){
       
		$data = $request->all();
        $data['referal_code'] = $this->generateUniqueCode();
        Mail::to($request->email)->send(new MyTestMail($data));

        $data['password'] = Hash::make($request->password);
        $userId = User::where('referal_code',$request->referal_code)->first();
      
        $reference = $userId->id;
        $userRoleId = $userId->user_type;
        $data['created_by'] = $reference;        
        $count=1;
        
        while($userRoleId >= $count){
            $userData = ''; 
            if($count === 5){
                if(isset($userId->creates->creates->creates->creates->user_type )){
                    $userData = $userId->creates->creates->creates->creates;
                    if($userRoleId === $userId->creates->creates->creates->creates->user_type){
                        $userData->increment('points',((float)$userId->roles->percentage_amount * ((int)$data['user_type'] - $userRoleId) ));                
                    }else{
                        $userData->increment('points',(float)$userId->creates->creates->creates->creates->roles->percentage_amount);                
                    }
                }
               
            }                       
            if($count === 4){
                if(isset($userId->creates->creates->creates->user_type)){
                    $userData = $userId->creates->creates->creates;
                    if($userRoleId === $userId->creates->creates->creates->user_type){
                        $userData->increment('points',((float)$userId->roles->percentage_amount * ((int)$data['user_type'] - $userRoleId) ));                
                    }else{
                        $userData->increment('points',(float)$userId->creates->creates->creates->roles->percentage_amount);                
                    }
                }
               
            }
            if($count === 3){
                if(isset($userId->creates->creates->user_type)){
                    $userData = $userId->creates->creates;                              
                    if($userRoleId === $userId->creates->creates->user_type){                   
                        $userData->increment('points',((float)$userId->roles->percentage_amount * ((int)$data['user_type'] - $userRoleId)));                
                    }else{                    
                        $userData->increment('points',(float)$userId->creates->creates->roles->percentage_amount);                
                    }                           
                }
            }
            if($count === 2){
                if(isset($userId->creates->user_type)){
                    $userData = $userId->creates;
                    if($userRoleId === $userId->creates->user_type){
                        $userData->increment('points',((float)$userId->roles->percentage_amount * ((int)$data['user_type'] - $userRoleId)));                
                    }else{
                        $userData->increment('points',(float)$userId->creates->roles->percentage_amount);                
                    }                
                }
            }
            if($count === 1){
                $userData = $userId;
                if($userRoleId === $userData->user_type){
                    $userData->increment('points',((float)$userId->roles->percentage_amount * ((int)$data['user_type'] - $userRoleId)));                
                }else{
                    $userData->increment('points',(float)$userId->roles->percentage_amount);                
                }                
            }
            $count++;
        }
		$user = User::create($data);
        return redirect()->back();
	}

    public function userEdit($request,$id){
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            ]);
        $input = $request->all();
        // dd($input);

        $user = User::find($id);
        // dd($user);
        return $user->update($input);
    }
}
