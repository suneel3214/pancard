<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ServiceRepository;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $serviceRepo;

    public function __construct(ServiceRepository $serviceRepo){
        $this->serviceRepo = $serviceRepo;
    }
    public function index()
    {
        $service = $this->serviceRepo->serviceGet();
        // dd($service);
        return view('backend.master.service.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.master.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $service = $this->serviceRepo->seriveStore($request);
       Alert::success('Success', 'Service Add Successfully');
       return redirect()->route('services.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('backend.master.service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function service_edit($id)
    {
        $service = Service::find($id);
        return response()->json([
            'status'=>200,
            'service'=> $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
    public function updateService(Request $request)
    {
        $service_id = $request->input('id');
        $service = Service::find($service_id);
        $service->service_name = $request->input('service_name');
        $service->description = $request->input('description');
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $iconImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $iconImage);
            $service['image'] = "$iconImage";
        }
        $service->update();
        Alert::success('Success', 'Updated Successfully');
        return redirect()->route('services.index');  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
    
        Alert::success('Deleted', 'Deleted Successfully');
        return redirect()->route('services.index');
    }
}
