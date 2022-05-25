<?php

namespace App\Http\Controllers;
// use App\User;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Food;
use App\Models\Area;
use App\Models\Order;
use App\Models\OrderDetails;
use Carbon\Carbon;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    public function admin_home()
    {
         $user_count = User::count();
         $restaurant_count = Restaurant::count();
         $category_count = Category::count();
         $food_count = Food::count();
         $areas_count = Area::count();
         $orders_count = Order::count();

        $date_code = "y";
        $users = User::all();
        // $users->appends($request->all());
        $restaurants = Restaurant::all();
        $categories = Category::all();
        $foods = Food::all();
        $areas = Area::all();
        $orders = Order::all();
        $order_details = OrderDetails::all();
           if(request("id") != null){
            $resturent = DB::table('food')->where("restaurant_id",request("id"));

           }else{
            $resturent = DB::table('food');
   
           }
             $order_detial_in_charts =   $resturent ->join("order_details","order_details.food_id","=","food.id")
           ->join("orders","order_details.order_id","=","orders.id")
           ->select("orders.*")
           ->get() ->groupBy(function($date) {
             return Carbon::parse($date->created_at)->format("d");
         });

   
        // $order_detial_in_charts = Order::orderBy("created_at", "asc")->get()
        //     ->groupBy(function($date) {
        //         return Carbon::parse($date->created_at)->format("d");
        //     });
    
        return view('admin.home', compact("users", "restaurants", "categories","foods","areas","orders", "order_details","order_detial_in_charts", "user_count", "restaurant_count","category_count","food_count","areas_count","orders_count"));
    }

}
