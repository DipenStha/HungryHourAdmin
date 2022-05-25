<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
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
        // return $request;
        $request->validate([
           "area_name"=>"required"
        ]);
            $Area = new Area();
            $Area->id = $request->id;
            $Area->area_name = $request ->area_name;
            $Area->save();
            return redirect()->back();
    }
    public function getArea(){
        return response()->json(Area::all(),200);
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
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
    }

    public function show_areas()    {
        $areas  = Area::paginate(10); 
        return view('admin.view.area.area',compact("areas"));
    }
    public function add_areas(){
        $areas = Area::all();
        return view('admin.add.area.area');
    }
    public function edit_areas($id){
         $areas  =  Area::find($id);
         return view('admin.edit.area.area',compact("areas"));
     }
    public function delete($id){
        Area::find($id)->delete();
        return redirect()->back();
    }
    public function update_areas($id)
    {
        $request = request();
        $request->validate([
           "id"=>"required",
           "area_name"=>"required"
        ]);
            $Area = Area::find($id);
            $Area->id = $request ->id;
            $Area->area_name = $request ->area_name;
            $Area->update();
            return redirect()->back();
    }
    
}

