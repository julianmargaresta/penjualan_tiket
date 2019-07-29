<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;    
use Exception;
use Mail;
use App\Mail\VerifyMail;
use Carbon\Carbon;

class RegisterController extends Controller
{
  public function index()
  {
      return view('auth.register');
  }

  public function doRegister(Request $request)
  {   

    try {
      $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'phone'=> 'required',
    ]);

        $data = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'role' => 'user',
          'password' => Bcrypt($request->password),
          'phone'=> $request->phone,
          'token'=> str_random(40),
        
          ]);
        //dd($data);
        Mail::to($data->email)->send(new VerifyMail($data));
        
        $code = 200;
        $message = 'success';
        $response['user'] = $data;
        $response['token'] = $data->createToken('myApp')->accessToken;
    } catch (Exception $e) {

      if ($e instanceof ValidationException) {
                $code = 400;
                $message = $e->errors();
                $response = [];

            }else{
                $code = 500;
                $message = $e->getMessage();
                $response = [];
            }
      }
      return apiResponse($code,$message,$response); 
    }

    public function verifyUser($token)
    {
        $now = Carbon::now('Asia/Jakarta');
        $verifyUser = User::where('token', $token)->first();
        if(isset($verifyUser) ){
         
            if(!$verifyUser->email_verified_at) {
                $verifyUser->email_verified_at = $now;
                $verifyUser->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/login')->with('status', $status);
    }
   
}
