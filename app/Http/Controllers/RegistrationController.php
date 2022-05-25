<?php

namespace App\Http\Controllers;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use App\OtpVerify;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
class RegistrationController extends Controller
{
    public function user(){
        $user = User::pagination(1);
        return response()->json($user, 404);
    }
    public function create(Request $request){
        $request->validate([
            "name"=>"required||min:5",
            "email"=>"required",
            "password"=>"required||min:5||max:20",
        ]);
            $User = new User();
            $User->name = $request -> name;
            $User->email = $request -> email;
            $User->password = bcrypt($request -> password);
            $User->photo = "images/profile.jpg";
            // $User->photo = $request ->photo;
            $User->save();
            return $User;
    }

    public function forgetPassword()
    {
        \request()->validate([
            "email"=>"required|email"
        ]);

//        return request();

        $email = User::where("email",\request()->email);

        if($email->count()){
            $email = $email->first();
            $otp =  rand(1000,9999);
            $user = User::find($email->id);
            $user->otp = $otp;
            $user->update();
            $data['name']= $user->name;
            $data['user_message']= $otp;
            $data['email']= $user->email;
            \Illuminate\Support\Facades\Mail::send('mail', $data, function($message) use($data) {
                $message->to($data['email']);
                $message->subject('Forget Password OTP');
            });
        }
    }


    public function verifyOtp(Request $request)
    {
        \request()->validate([
            "email"=>"required",
            "otp"=>"required",
        ]);
        $email = User::where("email",\request()->email)->where("otp",\request()->otp);

        if($email->count()){

            return  response()->json(["success"=>"Validate "],200);
        }
        return  response()->json(["success"=>"Invalid Otp  "],401);  
      }

    // public function verifyOtp(){
    //     $otp = trim(request('otp'));
    //     if($otp==''){
    //         return json_encode(array('statusCode'=>400,'msg'=>"otp not valid"));
    //     }
    //     else{
    //         $user = new OtpVerify;
    //         if($otp == session('otp')){
    //         $name = session('name');
    //         $email = session('email');
    //         $user->save();
    //         session()->flush();
    //         json_code(array('statusCode'=>200,'msg'=>'sucess'));

    //         }
    //         else{
    //             return json_encode(array('statusCode'=>400,'msg'=>"otp not valid"));
    //         }
    //     }
  
    // }



    public function update_profile_photo(Request $request){
        $User = User::find(auth("api")->user()->id);
        // $User->name = $request->photo;
        $file = base64_decode($request['photo']);
        $folderName = '/uploads/users/';
            $safeName = str_random(10).'.'.'png';
            $destinationPath = public_path() . $folderName;
            file_put_contents(public_path().'/uploads/users/'.$safeName, $file);
           //save new file path into db
        $User->photo = $safeName;
        $User->update();
        return $User;
    }
    public function show(){
        return User::find(1);
    }

    public function edit(){
        $user = User::find(1);
        $user->name = "Dipendra";
        $user->update();
    }
    public function delete(){
        $user = User::find(1);
        $user->delete();
    }
    public function login(){
        \request()->validate([
            "email"=>"required||email",
            "password"=>"required||max:30||min:6"
        ]);
        if(auth()->attempt(['email' => request()->email, 'password' => \request()->password])){
            $user = auth()->user();
            $user["token"] = $user->createToken("my app")->accessToken;
            return response($user, 200);
        }else{
            echo "Error";
        }
    }
    public function getUserDetail(){
      return \auth("api")->user();
    }
}
