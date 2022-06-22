<?php

namespace App\Repositories\Admin;
use App\Models\User;
use App\Models\Role;
use Auth;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        $data['password'] = Hash::make($request->password);
        $data['created_by'] = Auth::user()->id;
        $data['referal_code'] = $this->generateUniqueCode();
		$user = User::create($data);
       return redirect()->back();
		
	}

    public function userRegister($request){
       
		$data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['referal_code'] = $this->generateUniqueCode();
        $userId = User::where('referal_code',$request->referal_code)->first();
        $reference = $userId->id;
        $user_id = $userId->user_type;

        $data['created_by'] = $reference;
        // $authId = Auth::user()->id;
        $userParentsData = User::where('id', $reference )->with('creates')->first();
        // $admin = User::where('id',1)->first();
        // dd($userParentsData);
        $adminId = $userParentsData->creates->creates->creates->creates;
        $firstId = $userParentsData->creates->creates->creates;
        $secondId = $userParentsData->creates->creates;
        $thirdId = $userParentsData->creates;
        $forthId = $userParentsData;
        $point = Role::where('id',$user_id)->first();
        // dd($adminId);
        $receviePoints = $point->percentage_amount;
        $finalpoints =  $receviePoints*100/100;
        // dd($finalpoints);

        // if($admin){
        //     $authPoint = User::where('id',$admin->id)->increment('points',$finalpoints*1); 
        // }
        if($adminId){
            $authPoint = User::where('id',$adminId->id)->increment('points',$finalpoints*5);
        }
        if($firstId){
            $authPoint = User::where('id',$firstId->id)->increment('points',$finalpoints*4);
        }
        if($secondId){
            $authPoint = User::where('id',$secondId->id)->increment('points',$finalpoints*3);
        }
        if($thirdId){
            $authPoint = User::where('id',$thirdId->id)->increment('points',$finalpoints*2);
        }
        if($forthId){
            $authPoint = User::where('id',$forthId->id)->increment('points',$finalpoints*1);
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
