<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        //   return $request;
        $request->validate([
            "name"=>"required"
        ]);
        $Category = new Category();
        $Category->name = $request ->name;
        $Category->save();
        return redirect()->back();

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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function show_categories()    {
        $categories  = Category::paginate(10); 
        return view('admin.view.category.category',compact("categories"));
    }

    public function add_categories(){
        $categories = Category::all();
        return view('admin.add.category.category');
    }
    public function edit_categories($id){
         $categories  =  Category::find($id);
         return view('admin.edit.category.category',compact("categories"));
     }
    
    public function delete($id){
        Category::find($id)->delete();
        return redirect()->back();
    }

    public function update_categories($id)
    {
        // return $request;
        $request = request();
        $request->validate([
            "id"=>"required",
            "name"=>"required"
        ]);
        $Category = Category::find($id);
        $Category->id = $request ->id;
        $Category->name = $request ->name;
        $Category->update();
        return redirect()->back();
    }
}
