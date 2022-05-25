<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return
        return DeliveryAddress::where("user_id",auth("api")->user()->id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//    return $request;
//     return   auth("api")->user();
        \request()->validate([
            "first_name"=>"required",
            "last_name"=>'required',
            "contact_number1"=>'required',
            "areas_id"=>'required',
            "nearby_landmark"=>'required',
        ]);
        $User =  $request->id == "0" ? new DeliveryAddress(): DeliveryAddress::find($request->id);

        $User->first_name = $request -> first_name;
        $User->last_name = $request -> last_name;
        $User->user_id = auth("api")->user()->id;
        $User->contact_number1 = $request -> contact_number1;
        $User->contact_number_2 = $request -> contact_number_2??"";
        $User->areas_id = $request -> areas_id;
        $User->street = $request -> street??"";
        $User->house_no = $request -> house_no??"";
        $User->nearby_landmark = $request -> nearby_landmark;
        $request->id == "0" ? $User->save(): $User->update();

        $User->save();
        return $User;

//      return  DeliveryAddress::create($request->all());
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
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetails $orderDetails)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function show_order_details($id){
       
          $order_details  = Order::where("id",$id)->with(["details.food.restaurant","address.area","user"])->first()->desc(); 
        //  $orders_details =  DB::table('order_details')
        // ->join("order_details","order_details.id","=","order.order_details_id")
        // ->join("users", "users.id","=","orders.user_id")
        // ->join("order_details","delivery_addresses.id","=","orders.delivery_addresses_id")
        // ->join("areas","areas.id","=","delivery_addresses.area_id")
        // ->join("food","food.id","=","order_details.food_id")
        // ->join("restaurant","restaurant.id","=","food.restaurant_id")
        // ->select("orders.*","users.name", "areas.area_name","foods.food_name","restaurants.restaurant_name")
        // ->get();
        return view('admin.view.order_details.order_details',compact("order_details"));
    }
    public function add_order_details(){
        return view('admin.add.order_detail.order_detail');
    }
    public function edit_order_details($id){
         $order_details  =  OrderDetails::find($id);
         return view('admin.edit.order_detail.order_detail',compact("order_details"));
     }
 
    public function destroy()
    {
        \request()->validate([
            "id"=>"required"
        ]);
        $d = DeliveryAddress::find(\request()->id);
        $d->delete();
    }
    public function delete($id){
        OrderDetails::find($id)->delete();
        return redirect()->back();
    }
}
