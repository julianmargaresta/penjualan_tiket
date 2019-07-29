<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Films;
use Auth;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'film'  => 'required',
                'qty'   => 'required|numeric|min:1'
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

            if ($checkQuota < $selectFilm->studios->quota) {

                $dataOrder = new Orders;
                $dataOrder->user_id = $request->id;
                $dataOrder->film_id = $request->film;
                $dataOrder->qty = $request->qty;
                $dataOrder->total_price = $selectFilm->studios->price * $request->qty;
                $dataOrder->save();

                $code = 200;
                $message = 'success';
                $response = $dataOrder;
            } else {
                $code = 400;
                $message = 'Kuota tidak tersedia';
                $response = [];
            }
        } catch (\Exception $e) {

            if ($e instanceof ValidationException) {
                $code = 422;
                $message = $e->errors();
                $response = [];
            } else {
                $code = 500;
                $message = $e->getMessage();
                $response = [];
            }

        }

        return apiResponse($code, $message, $response);
    }
}
