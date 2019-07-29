<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class LoginController extends Controller
{
  public function index()
  {
      return view('auth.login');
  }

  public function doLogin(Request $request){
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
      ]);



      if(!Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
      ])){
        Session::flash('message_gagal', 'Username Atau password Salah');
        return redirect()->back();
      }elseif (!Auth::user()->email_verified_at) {
         Session::flash('message_gagal', 'Anda Belum Verifikasi Email, Silahkan Verifikasi Email');
         return redirect()->back();
      }elseif(Auth::user()->role == "admin"){
          return redirect('genre');
      }
      else{
          return redirect('dashboard');
      }
  }

  public function dologout()
  {
    Auth::logout();
    Session::flash('message', 'Sukses Keluar Akun');
    return redirect('login');
  }

}
