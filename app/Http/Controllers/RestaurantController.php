<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRestaurants()
    {
        $request_name = request()->name??"";

        $restaurant_ids =  Food::where("name","LIKE", "%".$request_name."%" )->pluck("restaurant_id");
        // return $restaurant_ids;
        return Restaurant::whereIn("id",$restaurant_ids)->get();
        // DB::delete('delete users where name = ?', ['John'])
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        // return $request;
        $request->validate([
            "name"=>"required",
            "address"=>"required",
            "opening_from"=>"required",
            "closing_at"=>"required"

        ]);
                // return $request;

            $Restaurant = new Restaurant();
            $Restaurant->name = $request -> name;
            if($request->file('logo')){
                $imageName = time().'.'.$request->logo->extension();  
     
            $request->logo->move(public_path('images'), $imageName);
            $image_path = "images/".$imageName;
            $Restaurant->logo = $image_path;
        }
            $Restaurant->address = $request -> address;
            $Restaurant->status = $request ->status??true;
            $Restaurant->open_from = $request -> opening_from;
            $Restaurant->close_at = $request -> closing_at;
            $Restaurant->save();
            return redirect()->back();
            // return $Restaurant;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)
    {
        $request->validate([
            "id"=>"required",
        ]);

        $rest = $request->id;
        $resturent = Restaurant::find($rest);
//        return DB::table('restaurants')->get();
        $cate = [];
        $category =  Category::with(['getFoods' => function ($query) use ($rest)  {
         $query->where(['restaurant_id' => $rest]);
        }])->get();
        $resturent["categories"]  =   $category;
         foreach($category as $category){
             if(count( $category->getFoods)){
                 array_push($cate, $category);
             } 
         }
        $resturent["categories"]  =$cate;
        return  $resturent;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
    public function show_restaurants()    {
        $restaurants  = Restaurant::paginate(5); 
        return view('admin.view.restaurant.restaurant',compact("restaurants"));
    }
    public function add_restaurants(){
       return view('admin.add.restaurant.restaurant');
   }
   public function edit_restaurants($id){
        $restaurants  =  Restaurant::find($id);
        return view('admin.edit.restaurant.restaurant',compact("restaurants"));
    }
    public function update_restaurants($id){
        $request = request();

        $request->validate([
            "name"=>"required",
            "address"=>"required",
            "opening_from"=>"required",
            "closing_at"=>"required"

        ]);
                // return $request;
            $Restaurant = Restaurant::find($id);
            $Restaurant->name = $request -> name;
            if($request->file('logo')){
                $imageName = time().'.'.$request->logo->extension();  
     
            $request->logo->move(public_path('images'), $imageName);
            $image_path = "images/".$imageName;
            $Restaurant->logo = $image_path;
        }
            $Restaurant->address = $request -> address;
            $Restaurant->status = $request ->status??true;
            $Restaurant->open_from = $request -> opening_from;
            $Restaurant->close_at = $request -> closing_at;
            $Restaurant->update();
            // return $Restaurant;
            return redirect()->back();
      }
   
    public function delete($id){
        //return $id;
        Restaurant::find($id)->delete();
        return redirect()->back()->with('message','service Delete Success');
    }
}
