<?php

namespace App\Repositories\Admin;
use App\Models\User;
use App\Models\Role;
use Auth;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user_id = Auth::user()->user_type;
        $authId = Auth::user()->id;
        $walletAmount = Auth::user()->points;
        $userParentsData = User::where('id', $authId )->with('creates')->first();
        // dd($userParentsData->creates->creates->creates);
        $firstId = $userParentsData->creates->creates->creates;
        $secondId = $userParentsData->creates->creates;
        $thirdId = $userParentsData->creates;
        $forthId = $userParentsData;

        // dd($forthId);


        if($request->user_type - $user_id == 4){
            $data1['points'] = 10 + $walletAmount;
        }
        elseif ($request->user_type - $user_id  == 3) {
            $data1['points'] = 10 + $walletAmount;
        }
        elseif ($request->user_type - $user_id == 2) {
            $data1['points'] = 10 + $walletAmount;
        }
        elseif ($request->user_type - $user_id == 1) {
            $data1['points'] = 10 + $walletAmount;
        }
        elseif ($request->user_type - $user_id == 0) {
            $data1['points'] = 10 + $walletAmount;
        }
        else{
            $data1['points'] = 0;
        }

        $point = Role::where('id',$user_id)->first();
        // dd($point);

        $receviePoints = $point->percentage_amount / 2;
        $finalAmount = $receviePoints / 2;


        // dd($receviePoints);
        $authPoint = User::where('id',$authId)->update($data1);
        $userPoint = User::where('id',$firstId->id)->increment('points',$finalAmount);
        $userPoint = User::where('id',$secondId->id)->increment('points',$finalAmount);
        $userPoint = User::where('id',$thirdId->id)->increment('points',$finalAmount);
        $userPoint = User::where('id',$forthId->id)->increment('points',$finalAmount);
        // dd($data);

        // dd($userPoint);
		$user = User::create($data);
       return redirect()->back();
		
	}

    public function userRegister($request){
       
		$data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['referal_code'] = $this->generateUniqueCode();
        // dd($userPoint);
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
