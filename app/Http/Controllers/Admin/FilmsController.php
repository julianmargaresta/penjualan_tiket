<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genres;
use App\Studios;
use App\Films;
use Session;
use Exception;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dataGenre = Genres::all(); //query kosong
        $dataStudio = Studios::all();

        $dataFilm = Films::query()->orderBy('created_at', 'desc');
        //seaarching data
        //jika kosong dia ngak di proses
        //strlen itu string len mengetahui isinya ada tau tidak
        if (request()->has('search') && strlen(request()->query("search"))>=1) {
            $dataFilm->where(
                "nama", "like", "%" . request()->query("search") . "%"
            );
        }
        //sorting data
        //query pagination
        $pagination = 5;
        $dataFilm = $dataFilm->paginate($pagination);
        //produck dihapus bisa tetep bisa dilihat

        //mengheandle perpindahan page
        $number =1;

        if (request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $pagination;
        }
        //ambil nama genre dan studio by id
        $dataGenre = Genres::select(["id", "name"])->orderBy("name")->get();
        $dataStudio = Studios::select(["id", "name"])->orderBy("name")->get();

         return view('admin.films.index', compact('dataFilm','dataGenre','dataStudio','number'));
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
        $this->validate($request,[
         'nama' => 'required',
         'deskripsi'=> 'required',
         'start_at' =>'required|date_format:Y-m-d|before:end_at',
         'end_at'=>'required|date_format:Y-m-d|after:start_at',
         'genre_id'=> 'required',
         'studio_id' => 'required',
         'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

         ]);
        try{
        \DB::beginTransaction();
        $dataFilm = Films::where('studio_id',$request->studio_id)->where('nama',$request->nama)->first();

        if ($dataFilm) throw new Exception("sudah ada film yang diputar di studio itu");
        $imageName = time().'.'.request()->foto->getClientOriginalExtension();
        request()->foto->move(public_path('images'),$imageName);

        $dataFilm = new Films();
        $dataFilm->nama = $request->nama;
        $dataFilm->deskripsi = $request->deskripsi;
        $dataFilm->genre_id = $request->genre_id;
        $dataFilm->start_at= $request->start_at;
        $dataFilm->end_at= $request->end_at;
        $dataFilm->studio_id= $request->studio_id;
        $dataFilm->foto = $imageName;
        //dd($dataFilm);
        $dataFilm->save();


        \DB::commit();
        $request->session()->flash('message','Berhasil Menambahkan');

           return redirect()->back();
        } catch (Exception $e) {
            report($e);
            \DB::rollBack();
            $request->session()->flash('message_gagal','Data Sudah Ada');
           return redirect()->back();
        }
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
        $dataFilm = Films::find($id);
        return view('admin.films.show' ,compact('dataFilm'));
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
        $dataFilm = Films::find($id);
        $dataGenre = Genres::select(["id", "name"])->orderBy("name")->get();
        $dataStudio = Studios::select(["id", "name"])->orderBy("name")->get();
        return view('admin.films.edit',compact('dataFilm','dataGenre','dataStudio'));
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
        $this->validate($request, [
          'nama'        => 'required',
          'deskripsi'        => 'required',
          'genre_id'        => 'required',
          'start_at'        => 'required',
          'end_at'        => 'required',
          'studio_id'        => 'required',
        ]);

        try {
          $film = Films::findOrFail($id);

          if($request->foto){
            $imageName = time().'.'.request()->foto->getClientOriginalExtension();
            request()->foto->move(public_path('images'), $imageName);
            $film->foto = $imageName;
            $film->nama = $request->nama;
            $film->deskripsi = $request->deskripsi;
            $film->genre_id = $request->genre_id;
            $film->studio_id = $request->studio_id;
            $film->start_at = $request->start_at;
            $film->end_at = $request->end_at;
            $film->save();
            Session::flash('message', 'Data Berhasil Di Edit');
          }
          else{
            $film->nama = $request->nama;
            $film->deskripsi = $request->deskripsi;
            $film->genre_id = $request->genre_id;
            $film->studio_id = $request->studio_id;
            $film->start_at = $request->start_at;
            $film->end_at = $request->end_at;
            $film->save();
            Session::flash('message', 'Data Berhasil Di Edit');
          }
        } catch (\Exception $e) {
          dd($e);
        }

        return redirect()->back();
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
        $data = Films::find($id);
        $data->delete();
        if($data) {
            Session::flash('message','Berhasil menghapus');
        }
        return redirect()->back();
    }
}
