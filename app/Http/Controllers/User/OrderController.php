<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Orders;
use App\User;
use App\Studios;
use App\Films;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $current =  Carbon::now()->format('Y.m.d');
      $dateStart = $current . ' 00:00:00';
      $dateEnd = $current . ' 23:59:59';
      $orderNow = Orders::where('created_at', '>=', $dateStart)->where('created_at', '<=', $dateEnd)->get();

      $dataUser = User::where('role', 'user')->get();


      $dataOrder = Orders::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
      //seaarching data
      //jika kosong dia ngak di proses
      //strlen itu string len mengetahui isinya ada tau tidak
      if (request()->has('search') && strlen(request()->query("search"))>=1) {
          $dataOrder->where(
              "qty", "like", "%" . request()->query("search") . "%"
          );
      }
      //sorting data
      //query pagination
      $pagination = 5;
      // $dataOrder = $dataOrder->paginate($pagination);
      //produck dihapus bisa tetep bisa dilihat

      //mengheandle perpindahan page
      $number =1;

      if (request()->has('page') && request()->get('page') > 1) {
          $number += (request()->get('page') - 1) * $pagination;
      }
      //ambil nama genre dan studio by id

      $dataFilm = Films::orderBy("nama")->where('start_at', '<=', $current)->where('end_at', '>=', $current)
                                        ->get();

       return view('user.order', compact('dataFilm', 'dataUser', 'dataOrder', 'number',  'orderNow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
