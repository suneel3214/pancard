<?php

namespace App\Repositories\Admin;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Auth;
use App\Models\Service;
use Illuminate\Support\Facades\File;


/**
 * Class PackageRepository.
 */
class ServiceRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */

     public function seriveStore($request){
        $data = $request->all();
        $data['created_by'] = Auth::user()->id;
        
        if ($image = $request->file('image')) {
         $destinationPath = 'image/';
         $iconImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $iconImage);
         $data['image'] = "$iconImage";
     }
        $service = Service::create($data);
        return redirect()->back();
     }
      
     public function serviceGet(){
      $service = Service::with('creates')->orderBy('id', 'desc')->get();
      // dd($service);
      return $service;
     }
   
}
