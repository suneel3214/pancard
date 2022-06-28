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
       
		$data = $request->all();
        $data['referal_code'] = $this->generateUniqueCode();
        Mail::to($request->email)->send(new MyTestMail($data));
        $data['password'] = Hash::make($request->password);
        $data['created_by'] = Auth::user()->id;

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
                if(isset($userId->creates->creates->creates->creates->user_type)){
                    $userData = $userId->creates->creates->creates->creates;
                    if($userRoleId === $userId->creates->creates->creates->creates->user_type){
                        $userData->increment('points',((float)$userId->roles->percentage_amount * (5-$userRoleId) ));                
                    }else{
                        $userData->increment('points',(float)$userId->creates->creates->creates->creates->roles->percentage_amount);                
                    }
                }
               
            }                       
            if($count === 4){
                if(isset($userId->creates->creates->creates->user_type)){
                    $userData = $userId->creates->creates->creates;
                    if($userRoleId === $userId->creates->creates->creates->user_type){
                        $userData->increment('points',((float)$userId->roles->percentage_amount * (5-$userRoleId) ));                
                    }else{
                        $userData->increment('points',(float)$userId->creates->creates->creates->roles->percentage_amount);                
                    }
                }
               
            }
            if($count === 3){
                if(isset($userId->creates->creates->user_type)){
                    $userData = $userId->creates->creates;                              
                    if($userRoleId === $userId->creates->creates->user_type){                   
                        $userData->increment('points',((float)$userId->roles->percentage_amount * (5-$userRoleId)));                
                    }else{                    
                        $userData->increment('points',(float)$userId->creates->creates->roles->percentage_amount);                
                    }                           
                }
            }
            if($count === 2){
                if(isset($userId->creates->user_type)){
                    $userData = $userId->creates;
                    if($userRoleId === $userId->creates->user_type){
                        $userData->increment('points',((float)$userId->roles->percentage_amount * (5-$userRoleId)));                
                    }else{
                        $userData->increment('points',(float)$userId->creates->roles->percentage_amount);                
                    }                
                }
            }
            if($count === 1){
                $userData = $userId;
                if($userRoleId === $userData->user_type){
                    $userData->increment('points',((float)$userId->roles->percentage_amount * (5-$userRoleId)));                
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
