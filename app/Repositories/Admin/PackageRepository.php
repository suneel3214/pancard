<?php

namespace App\Repositories\Admin;
use App\Models\Role;
use App\Models\Package;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Auth;


/**
 * Class PackageRepository.
 */
class PackageRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */

   public function getRoll(){
    
    $role = Role::all();
    $role = Role::select('*')->where('id','!=',Auth::id())->get();
    if(Auth::check()){
        return $role;
    }else{
        return $role;
    }
   }

   public function packageStore($request){
    $data = $request->all();
    $package = Package::create($data);
    return redirect()->back();
   }

//    public function packageEdit($request,$id){
//     $input = $request->all();

//     $package = Package::find($id);
//     return $package->update($input);
// }
}
