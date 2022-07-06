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
use Illuminate\Support\Facades\Http;
use App\Helper\Curlhelpers;

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
        $data = User::with('roles','creates')->orderBy('id', 'desc')->paginate(10);
        // dd($data);
        $data = User::with('roles','creates')->orderBy('id', 'desc')->select('*')->where('id', '!=', Auth::id())->paginate(10);

        if(Auth::check()){
            return $data;
        }
        else{
            return $data;
        }
    }

    public function getAllUser()
    {
        $data = User::with('roles')->orderBy('id', 'desc')->paginate(10);

        $data = User::with('roles')->orderBy('id', 'desc')->select('*')->where('id', '!=', Auth::id())->paginate(10);

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
        $data['show_password'] = $request->password;
        $data['referal_code'] = $this->generateUniqueCode();
        $data['username'] = $generateCode.$request->mobile;
        Mail::to($request->email)->send(new MyTestMail($data));
        $data['password'] = Hash::make($request->password);
        $data['created_by'] = Auth::user()->id;
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
             
        $api = Curlhelpers::vle_create($dataApi);
        // dd($api);
		$user = User::create($data);

       return redirect()->back();
		
	}

    public function userRegister($request){
        $generateCode = 'PCS';
		$data = $request->all();
        $data['show_password'] = $request->password;
        $data['referal_code'] = $this->generateUniqueCode();
        $data['username'] = $generateCode.$request->mobile;
        Mail::to($request->email)->send(new MyTestMail($data));
        $data['password'] = Hash::make($request->password);
        $userId = User::where('referal_code',$request->referal_code)->first();
        // dd($data);
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
             
        $api = Curlhelpers::vle_create($dataApi);
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
 