<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\RoleRepository;
use App\Models\Role;

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
   
}
