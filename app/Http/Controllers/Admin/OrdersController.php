<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Films;
use App\Orders;
use App\Studios;
use Session;
use Exception;
use Carbon\Carbon;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $current =  Carbon::now()->format('Y.m.d');
        $dateStart = $current . ' 00:00:00';
        $dateEnd = $current . ' 23:59:59';
        $orderNow = Orders::where('created_at', '>=', $dateStart)->where('created_at', '<=', $dateEnd)->get();

        $dataUser = User::where('role', 'user')->get();
        //query kosong
        $dataStudio = Studios::where('film_id',$request->id);

        $dataOrder = Orders::query()->orderBy('created_at', 'desc');
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
        $dataOrder = $dataOrder->paginate($pagination);
        //produck dihapus bisa tetep bisa dilihat

        //mengheandle perpindahan page
        $number =1;

        if (request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $pagination;
        }
        //ambil nama genre dan studio by id

        $dataFilm = Films::orderBy("nama")->where('start_at', '<=', $current)->where('end_at', '>=', $current)
                                          ->get();

         return view('admin.orders.index', compact('dataFilm', 'dataUser', 'dataOrder', 'number', 'dataStudio', 'orderNow'));
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
        $request->validate([
            'user'   => 'required',
            'film'   => 'required',
            'qty'       => 'required|numeric|min:1'
        ]);

        $now = Carbon::now()->format('Y.m.d');
        $startNow = $now . ' 00:00:00';
        $endNow = $now . ' 23:59:59';

        // ambil row film yang dipilih
        $selectFilm = Films::find($request->film);
        // liat kuota film yang sudah dibeli hari ini
        $seeQuota = Orders::where('film_id', $request->film)->where('created_at', '>=', $startNow)->where('created_at', '<=', $endNow)->sum('qty');
        // cek kuota setelah di tambah dengan input
        $checkQuota = $seeQuota + $request->qty;

        try {
            if ($checkQuota < $selectFilm->studios->quota) {

                $dataOrder = new Orders;
                $dataOrder->user_id = $request->user;
                $dataOrder->film_id = $request->film;
                $dataOrder->qty = $request->qty;
                $dataOrder->total_price = $selectFilm->studios->price * $request->qty;
                $dataOrder->save();

                $request->session()->flash('message', 'Berhasil Menambahkan order');
            } else {
                $request->session()->flash('error', 'Kuota tidak tersedia');
            }
        } catch (\Exception $e) {
            $request->session()->flash('message_gagal', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataOrder = Orders::find($id);

        return view('admin.orders.show', compact('dataOrder'));
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
