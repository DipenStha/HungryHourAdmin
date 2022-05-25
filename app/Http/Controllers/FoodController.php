<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;


class FoodController extends Controller
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
    public function create( Request $request)
    {
        //  return $request;
        $request->validate([
            "restaurant_id"=>"required",
            "name"=>"required",
            "price"=>"required",
            "category_id"=>"required",
        ]);
            $Food = new Food();
            $Food->restaurant_id = $request-> restaurant_id;
            $Food->name = $request ->name;
            $Food->price = $request ->price;
            $Food->category_id = $request ->category_id;  
            $Food->save();
            return redirect()->back();
            // return $Food;
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
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
    public function show_foods()    {
        //  $foods  = Food::paginate(10); 
        //  $foods = DB::table('food')
        // ->join("restaurants","restaurants.id","=","food.restaurant_id")
        // ->join("categories","categories.id","=","food.category_id")
        // ->select("food.*","restaurants.name", "categories.name")
        // ->get();
        // return view('admin.view.food.food',compact("foods"));

        $foods  =  Food::paginate(10);
        $restaurants  = Restaurant::all(); 
        $categories = Category::all();
       return view('admin.view.food.food',compact("restaurants", "categories","foods"));
    }
    public function add_foods(){
        $restaurants  = Restaurant::all(); 
        $categories = Category::all();
        return view('admin.add.food.food',compact("restaurants", "categories"));
    }
    public function edit_foods($id){
         $foods  =  Food::find($id);
         $restaurants  = Restaurant::all($id); 
         $categories = Category::all($id);
        return view('admin.edit.food.food',compact("restaurants", "categories","foods"));
     }
    public function delete($id){
        Food::find($id)->delete();
        return redirect()->back();
    }

    public function update_foods($id)
    {
        $request = request();
        // return $request;
        $request->validate([
            "restaurant_id"=>"required",
            "food_name"=>"required",
            "price"=>"required",
            "category_id"=>"required",
        ]);
            $Food = Food::find($id);
            $Food->restaurant_id = $request-> restaurant_id;
            $Food->name = $request ->name;
            $Food->price = $request ->price;
            $Food->category_id = $request ->category_id;  
            $Food->update();
            return redirect()->back;
    }
}
