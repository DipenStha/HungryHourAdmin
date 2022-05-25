<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
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
    public function create(Request $request)
    {
    //    return $request;
        $request->validate([
            "delivery_addresses_id"=>"required",
            "order_date"=>"required",
            "order_total"=>"required",
            "order_details"=>"required"
        ]); ;
        $order_details = json_decode($request->order_details);
        $Order = new Order();
        $Order->delivery_addresses_id = $request -> delivery_addresses_id;
        $Order->order_date = $request -> order_date;
        $Order->user_id = auth("api")->user()->id;
        $Order->sub_total = $request -> sub_total;
        $Order->delivery_charge = $request -> delivery_charge;
        $Order->service_charge = $request -> service_charge;
        $Order->vat_amount = $request -> vat_amount;
        $Order->isPaid = $request->isPaid=="true"?true:false;
        $Order->order_total = $request ->order_total;
        $Order->save();
        foreach($order_details as $order_detail){
            $orderDe = new OrderDetails();
            $orderDe->quantity = $order_detail->quantity;
            $orderDe->total = $order_detail->total;
            $orderDe->food_id = $order_detail->food_id;
            $orderDe->order_id = $Order->id;
            $orderDe->save();
        }
        return $Order;
    }

//    public function order_details(Request $request){
//        $request->validate([
//
//        ])
//    }
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    
    }
    public function show_orders()    {
     $orders =  DB::table('orders')
        ->join("delivery_addresses","delivery_addresses.id","=","orders.delivery_addresses_id")
        ->join("areas","areas.id","=","delivery_addresses.areas_id")
        ->join("users","users.id","=","delivery_addresses.user_id")
        ->select("orders.*","users.name", "areas.area_name")
        ->get();
    //   $orders = Order::paginate(10);
      $orders = Order::orderBy('order_date', 'DESC')->paginate(10);  

        // return $orders  = Order::with("deliveryAddress")->paginate(10); 
        return view('admin.view.order.order',compact("orders"));
    }
    public function add_orders(){
       return view('admin.add.order.order');
   }
   public function edit_orders($id){
        $orders  =  Order::find($id);
        return view('admin.edit.order.order',compact("orders"));
    }

    public function delete($id){
        Order::find($id)->delete();
        return redirect()->back();
    }
}
