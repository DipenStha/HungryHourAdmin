<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\DeliveryAddress;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class DeliveryAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryAddress $deliveryAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryAddress $deliveryAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryAddress $deliveryAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryAddress $deliveryAddress)
    {
        $user = User::find(1);
        $user->delete();

    }

    public function show_delivery_addresses()    {
        
        $delivery_addresses  = DeliveryAddress::paginate(10); 
        return view('admin.view.delivery_address.delivery_address',compact("delivery_addresses"));
    }
    public function add_delivery_addresses(){
        $delivery_addresses = DeliveryAddress::all();
        return view('admin.add.delivery_address.delivery_address');
    }
    public function edit_delivery_addresses($id){
       $areas = Area::all();
       $delivery_addresses  =  DeliveryAddress::find($id);
       return view('admin.edit.delivery_address.delivery_address',compact("delivery_addresses", "areas"));
     }
    public function delete($id){
        DeliveryAddress::find($id)->delete();
        return redirect()->back();
    }
    public function update_delivery_addresses($id){
        $request = request();
        $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "contact_number1"=>"required",
            "areas_id"=>"required",
            "street"=>"required",
            "house_no"=>"required",
            "nearby_landmark"=>"required"
        ]);
        $DeliveryAddresses = DeliveryAddress::find($id);
        $DeliveryAddresses->first_name = $request ->first_name;
        $DeliveryAddresses->last_name = $request ->last_name;
        $DeliveryAddresses->contact_number1 = $request ->contact_number1;
        $DeliveryAddresses->contact_number_2 = $request ->contact_number_2;
        $DeliveryAddresses->areas_id = $request ->areas_id;
        $DeliveryAddresses->street = $request ->street;
        $DeliveryAddresses->house_no = $request ->house_no;
        $DeliveryAddresses->nearby_landmark = $request ->nearby_landmark;
        $DeliveryAddresses->update();
        return redirect()->back();
    }
}
