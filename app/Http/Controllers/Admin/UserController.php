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
        // $curl = curl_init();
        // curl_setopt_array($curl,
        // array(
        // CURLOPT_URL =>
        // "https://panmitra.com/api/coupon_req.php",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING
        // => "",
        // CURLOPT_MAXREDIRS
        // => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION
        // => true,
        // CURLOPT_HTTP_VERSION =>
        // CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => array('api_key' => 'e5e27c-f8edec-6bbfa6-e5e996-51bf0d','vle_id' => 'PSA ID','type' => '2','qty' => '2'),
        // ));
        // $response =
        // curl_exec($curl);
        // curl_close($curl);
        // dd($response);
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

    public function register(Request $request)
    { 
        $request->validate([
        'name' => 'required',
        'mobile' => 'required|unique:users',
        'state' => 'required',
        'user_type' => 'required',
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
            Alert::success('Failed', 'Registration Failed ..!');
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
    $user_id = Auth::user()->user_type;
    $role = $this->userRepo->getRole();
     return view('backend.user.edit',compact('user','role','user_id'));
    
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
