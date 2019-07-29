<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Films;
use App\Http\Resources\Film as FilmResource;
use App\Http\Resources\FilmCollection;
use Carbon\Carbon;

class FilmsController extends Controller
{
    /**
     * see all film
     */
    public function index()
    {
        try {
            // jika menggunakan param genre maka akan melihat semua film berdasarkan genre
            if (request()->has('genre') && strlen(request()->query('genre')) >= 1) {

                $film = Films::whereHas('genres', function ($genre) {
                    $genre->where('name', request()->query('genre'))->with('genres');
                })->paginate(10);

            } else if (request()->has('active')) {

                $now = Carbon::now()->format('Y.m.d');
                $film = Films::where('start_at', '<=', $now)->where('end_at', '>=', $now)->paginate(10);

            } else if(request()->has("search") && strlen(request()->query("search")) >= 1) {

              $film = Films::where("nama", "like", "%" . request()->query("search") . "%")->paginate(10);
            
            } else {

                $film = Films::paginate(10);

            }
            $dataFilm = new FilmCollection($film);

            $code = 200;
            $message = 'success';
            $response = $dataFilm;
        } catch (\Exception $e) {
            $code = 500;
            $message = $e->getMessage();
            $response = [];
        }

        return apiResponse($code, $message, $response);
    }

}
