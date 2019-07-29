<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
      $now = Carbon::now()->format('d-m-Y');
      return view('user.dashboard', compact('now'));
    }
}
