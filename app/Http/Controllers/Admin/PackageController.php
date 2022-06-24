<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Repositories\Admin\PackageRepository;
use RealRashid\SweetAlert\Facades\Alert;

class PackageController extends Controller
{
    private $packageRepo;

    public function __construct(PackageRepository $packageRepo){
        $this->packageRepo = $packageRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
       $package = Package::with('roles')->orderBy('id', 'desc')->paginate(10);
        $role = $this->packageRepo->getRoll();
        return view('backend.master.package.create',compact('role','package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->packageRepo->packageStore($request);
        // dd($user);
        Alert::success('Success', 'Package Created Successfully');
        return redirect()->route('packages.create');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function package_edit($id){
        $package = Package::find($id);
        return response()->json([
            'status'=>200,
            'package'=> $package,
        ]);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePackage(Request $request)
    {
        $pack_id = $request->input('id');
        $package = Package::find($pack_id);
        $package->name = $request->input('name');
        $package->amount = $request->input('amount');
        $package->discount = $request->input('discount');
        $package->role_id = $request->input('role_id');
        $package->description = $request->input('description');

        $package->update();
  
        Alert::success('Success', 'Updated Successfully');
        return redirect()->route('packages.create');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
    
        Alert::success('Deleted', 'Deleted Successfully');
        return redirect()->route('packages.create');  
    }
}
