<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\UserRepository;
use Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\State;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    private $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.csv');
    }
    public function allUsers(){
      
        $data = $this->userRepo->AllUser();
    //    dd($data);
        return view('backend.user.allusers',compact('data'));
    }

    public function index(){
        $data = $this->userRepo->getAllUser();
        // dd($data);
        $user_id = Auth::user()->user_type;
        $authId = Auth::user()->id;
        return view('backend.user.index',compact('data','user_id','authId'));
    }

    public function create(){
        $user_id = Auth::user()->user_type;
        $role = $this->userRepo->getRole();
        $state = State::all();       
        return view('backend.user.create',compact('user_id','role','state'));
    }

    public function store(Request $request)
    { 
        $request->validate([
        'email' => 'required|unique:users',
        "password" => 'required|min:8|confirmed',
        ]);
        $user = $this->userRepo->userStore($request);
        // dd($user);
        $role_id = Auth::user()->user_type;
        // dd($role_id);
        Alert::success('Success', 'The information has been sent to the user email.');
        if($role_id === 1){
        return redirect()->route('admin.all.users');    
            
        }else{
            return redirect()->route('admin.index');    
        }
        
    }

    public function fetchRole(Request $request)
    {   
        
        $user = User::where('referal_code',$request->user_id)->first();
        $data['roles'] = Role::where('id','>' ,$user->user_type)->where('id','!=', 2)->get(); 
        return response()->json($data);
    } 

    public function userRegister(){
        $state = State::all();
        $userId = User::all(); 
        return view('frontend.register',compact('state','userId'));
    }

    public function register(Request $request)
    { 
        $request->validate([
        'name' => 'required',
        'mobile' => 'required|unique:users',
        'user_type' => 'required',
        'shop_name' => 'required',
        'district' => 'required',
        'state_id' => 'required',
        'referal_code' => 'required|exists:users,referal_code',
        'email' => 'required|unique:users',
        "password" => 'required|min:8|confirmed',
        ]);
        $user = $this->userRepo->userRegister($request);
        // dd($user);
        if($user){
            Alert::success('Success', 'The information has been sent to the user email');
            return redirect()->route('login'); 
        }else{
            Alert::error('Failed', 'Registration Failed ..!');
            return redirect()->back(); 
        }
           
        
    }

    public function activate(Request $request,$id)
    { 
        $user = User::find($id);
        if($user->status == 1){
            $user->status = 0 ;
            $user->save();
            Alert::success('UnAcivate', 'User UnAcivate Successfully');

        }
        else{
            $user->status = 1 ;
            $user->save();
            Alert::success('Acivate', 'User Acivate Successfully');

        }
    
    return redirect()->back(); 
   }

   public function edit($id){
    $user = User::with('roles')->find($id);
    // dd($user);
    $state = State::all();
    $user_id = Auth::user()->user_type;
    $role = $this->userRepo->getRole();
     return view('backend.user.edit',compact('user','role','user_id','state'));
    
   }

   public function update(Request $request , $id){
    
    $user = $this->userRepo->userEdit($request,$id);

    $role_id = Auth::user()->user_type;
    // dd($role_id);
    Alert::success('Success', 'Updated Successfully');
    if($role_id === 1){
    return redirect()->route('admin.all.users');    
        
    }else{
         return redirect()->route('admin.index');    
    }
      
   }
    
    
}
