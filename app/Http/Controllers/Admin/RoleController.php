<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\RoleRepository;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{

   private $rolesRepo;

   public function __construct(RoleRepository $rolesRepo){
    $this->rolesRepo = $rolesRepo;
   }

   public function index(){
    $data = $this->rolesRepo->getRoleAdmin();
    // dd($data);
    return view('backend.master.role.index',compact('data'));
   }
   public function edit($id){
      $role = Role::find($id);
      return response()->json([
          'status'=>200,
          'role'=> $role,
      ]);
  }

  public function percentAmount(Request $request)
  {
      $role_id = $request->input('id');
      $role = Role::find($role_id);
      $role->percentage_amount = $request->input('percentage_amount');
      $role->update();

      Alert::success('Success', 'Updated Successfully');
      return redirect()->route('admin.role');  
  }
   
}
