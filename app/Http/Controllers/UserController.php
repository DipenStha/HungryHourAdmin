<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');
    }

    public function create(Request $request)
    {
        // return $request;
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",

        ]);
        // return $request;
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = bcrypt($request->password);
        $User->photo = "images/1648271754.jpg";

        if ($request->file('photo')) {
            $imageName = time() . '.' . $request->photo->extension();

            $request->photo->move(public_path('images'), $imageName);
            $image_path = "images/" . $imageName;
            $User->photo = $image_path;
        }
        $User->save();
        return redirect()->back();
        // return $Restaurant;
    }


    public function show_users()
    {
        $users  = User::paginate(10);
        // return $users;
        return view('admin.view.user.user', compact("users"));
    }
    public function add_users()
    {
        $users = User::all();
        return view('admin.add.user.user', compact("users"));
    }
    public function edit_users($id)
    {
        $users  =  User::find($id);
        return view('admin.edit.user.user', compact("users"));
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function update_users($id)
    {
        $request = request();
        $request->validate([
            "name" => "required",
            "email" => "required",
        ]);
        // return $request;
        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        if ($request->file('photo')) {
            $imageName = time() . '.' . $request->photo->extension();

            $request->photo->move(public_path('images'), $imageName);
            $image_path = "images/" . $imageName;
            $User->photo = $image_path;
        }
        // return $User;
        $User->update();
        return redirect()->back();
    }


    // public function showUsers()
    // {
    //     $request_name = request()->name??"";

    //     $user_ids =  User::where("name","LIKE", "%".$request_name."%" )->pluck("id");
    //     // return $restaurant_ids;
    //      User::whereIn("id",$user_ids)->get();
    //     // DB::delete('delete users where name = ?', ['John'])
    // }

}
